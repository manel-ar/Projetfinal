<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

use App\Models\BonCommandeService;
use App\Models\NomCommercial;
use App\Models\Dci;
use App\Models\Ordonnance;
use App\Models\BonlivraisonService;
use App\Models\LigneBonLivraison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacienController extends Controller
{
    public function bonCF()
    {
        return view('AjouterBCF');
    }

    public function boncommandefournisseur()
    {

        //$idPharmacien =  auth()->user()->pharmacist->first()->id;
        //$idPharmacienChef = ChiefPharmacist->id;
        $dcis = Dci::all();
        return view('AjouterBCF', compact('dcis'));
    }
    public function listeBonsDeCommandeFournisseur()
    {
        return view('listeBCF');
    }
    ////////////////////////////////////////////////////////////
    public function showBonLivraison()
    {
        return view('bonlivraison');
    }

    public function listeTousBonsDeCommande()
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            $user = auth()->user();

            // Vérifier si l'utilisateur est un pharmacien
            if ($user->pharmacist) {
                $bonsDeCommandeMedecins = BonCommandeService::whereNotNull('id_doc')
                    ->with(['lignes.nomCommercial.dci', 'medecin.user']) // Inclure les informations sur le médecin et l'utilisateur associé
                    ->get();

                return view('listeTousBonsDeCommande', compact('bonsDeCommandeMedecins'));
            } else {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }
    }

    public function getbc($id)
    {
        $bonDeCommande = BonCommandeService::with('lignes.nomCommercial.dci', 'medecin.user', 'service')->findOrFail($id);
        return view('consultbc', compact('bonDeCommande'));
    }
    // bon de livraison
    public function create($id_bcs)
    {
        $bonDeCommande = BonCommandeService::with('lignes.nomCommercial.dci')->find($id_bcs);
        if (!$bonDeCommande) {
            return redirect()->back()->with('error', 'Bon de commande non trouvé.');
        }

        $nomsCommerciaux = NomCommercial::all();

        return view('bonlivraison', compact('bonDeCommande', 'nomsCommerciaux'));
    }

    protected function getIdCommercForLine($id_dci)
    {
        $dci = Dci::findOrFail($id_dci);
    
        $nomCommercial = $dci->nomCommercial->first(); // Sélectionne le premier élément de la collection
    
        if ($nomCommercial) {
            return $nomCommercial->id_commerc;
        } else {
            
            return 1; 
        }
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        $idPharmacien = $user->pharmacist->id;

        // Log des données reçues
        Log::info('Données reçues :', $request->all());

        // Validation des données
        try {
            // dd($request->all());
            $validatedData = $request->validate([
                'date' => 'required|date',
                'id_bcs' => 'required|exists:bon_commande_service,id',
                'id_ordonnance' => 'nullable|exists:ordonnance,id',
                'lignes' => 'required|array',
                'lignes.*.id_dci' => 'required|integer|exists:dci,id',
                'lignes.*.id_commerc' => 'required|exists:nom_commercial,id_commerc',
                // Validation pour l'existence de l'ID DCI
                'lignes.*.quantite_demandee' => 'required|integer|min:0',
                'lignes.*.quantite_livree' => 'required|integer|min:0',
                'lignes.*.quantite_restante' => 'required|integer|min:0',
                'lignes.*.prix_unit' => 'required|numeric|min:0',
                'lignes.*.Montant' => 'required|numeric|min:0',
            ]);
        } catch (ValidationException $e) {
            Log::error('Erreurs de validation :', $e->errors());
            return redirect()->back()->withErrors($e->validator)->withInput();
        }

        // Log des données validées
        Log::info('Données validées :', $validatedData);

        // Vérification de l'existence d'un bon de livraison pour ce bon de commande
        $bonCommandeService = BonCommandeService::find($validatedData['id_bcs']);

        if (!$bonCommandeService) {
            return redirect()->back()->with('error', 'Le bon de commande service spécifié n\'existe pas.');
        }

        // Vérifier si un bon de livraison existe déjà pour ce bon de commande dans BonLivraisonService
        $existingBonLivraison = BonLivraisonService::where('id_bcs', $validatedData['id_bcs'])->first();

        if ($existingBonLivraison) {
            return redirect()->back()->with('error', 'Un bon de livraison existe déjà pour ce numéro de bon de commande.');
        }



        DB::beginTransaction();

        try {
            $bonLivraison = new BonLivraisonService();
            $bonLivraison->date = $validatedData['date'];
            $bonLivraison->id_bcs = $bonCommandeService->id;
            $bonLivraison->id_pharmacien = $idPharmacien;
            $bonLivraison->id_chef = 1;
            $bonLivraison->save();

            Log::info('Bon de livraison créé :', $bonLivraison->toArray());

            $bonDeCommande = BonCommandeService::find($bonCommandeService->id); // Récupération du bon de commande par son ID
            if ($bonDeCommande) {
                $bonDeCommande->etat = 'livré';
                $bonDeCommande->save();
            } else {
                throw new \Exception('Bon de commande non trouvé.');
            }

            foreach ($validatedData['lignes'] as $index => $ligneData) {
                $id_commerc = $this->getIdCommercForLine($ligneData['id_dci']);
                Log::info('ID Commerc pour ligne ' . $index . ': ' . $id_commerc);

                $ligneBonLivraison = new LigneBonLivraison();
                $ligneBonLivraison->id_commerc = $id_commerc;
                $ligneBonLivraison->quantite_demandee = $ligneData['quantite_demandee'];
                $ligneBonLivraison->quantite_livree = $ligneData['quantite_livree'];
                $ligneBonLivraison->quantite_restante = $ligneData['quantite_restante'];
                $ligneBonLivraison->prix_unit = $ligneData['prix_unit'];
                $ligneBonLivraison->Montant = $ligneData['Montant'];
                $ligneBonLivraison->id_bls = $bonLivraison->id;
                $ligneBonLivraison->save();

                Log::info('Ligne de bon de livraison créée :', $ligneBonLivraison->toArray());
            }

            DB::commit();
            return redirect()->back()->with('success', 'Bon de Livraison créé avec succès');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la création du bon de livraison :', ['message' => $e->getMessage()]);

            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du bon de livraison.');
        }
    }
    // ordonnances

    public function listeOrdonnancesPharmacien()
    {
        if (Auth::check()) {
            $user = auth()->user();
            if ($user->pharmacist) {
                $ordonnances = Ordonnance::with(['medecin.user'])->get();
                return view('pharmacien.liste_ordonnances', compact('ordonnances'));
            } else {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
            }
        }
    }

    public function voirOrdonnancePharmacien($id)
    {
        $ordonnance = Ordonnance::with('medecin.user', 'bonCommandeService.service', 'lignes.nomCommercial.dci')->findOrFail($id);
        return view('pharmacien.voir_ordonnance', compact('ordonnance'));
    }
    // bon de livraison
    public function createBonLivraisonOrdonnance($id_ordonnance)
    {
        $ordonnance = Ordonnance::with('lignes.nomCommercial.dci')->find($id_ordonnance);
        $nomsCommerciaux = NomCommercial::all();

        return view('pharmacien.bonlivraison', compact('ordonnance', 'nomsCommerciaux'));
    }
    public function getFirstBcsId()
    {
        $firstBcs = BonCommandeService::orderBy('id', 'asc')->first();
        return $firstBcs ? $firstBcs->id : null;
    }

    public function storeBonLivraisonOrdonnance(Request $request)
    {
        $user = auth()->user();
        $idPharmacien = $user->pharmacist->id;

        // Validation des données
        try {
            $validatedData = $request->validate([
                'date' => 'required|date',
                'id_bcs' => 'nullable|exists:bon_commande_service,id',
                'id_ordonnance' => 'required|exists:ordonnance,id',
                'lignes' => 'required|array',
                'lignes.*.id_commerc' => 'required|exists:nom_commercial,id_commerc',
                'lignes.*.quantite_demandee' => 'required|integer|min:0',
                'lignes.*.quantite_livree' => 'required|integer|min:0',
                'lignes.*.quantite_restante' => 'required|integer|min:0',
                'lignes.*.prix_unit' => 'required|numeric|min:0',
                'lignes.*.Montant' => 'required|numeric|min:0',
            ]);

            // Récupérez le premier ID de bon de commande service
            $firstBcs = BonCommandeService::orderBy('id', 'asc')->first();
            $firstBcsId = $firstBcs ? $firstBcs->id : null;

            if (!$firstBcsId) {
                return redirect()->back()->withErrors(['error' => 'Aucun bon de commande service trouvé.'])->withInput();
            }
        } catch (ValidationException $e) {
            Log::error('Erreurs de validation :', $e->errors());
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
        // verification existance

        $existingBonLivraison = BonLivraisonService::where('id_ordonnance', $validatedData['id_ordonnance'])->first();

        if ($existingBonLivraison) {
            return redirect()->back()->with('error', 'Un bon de livraison existe déjà pour cette ordonnance.');
        }
        DB::beginTransaction();

        try {
            // Créer le bon de livraison
            $bonLivraison = new BonLivraisonService();
            $bonLivraison->date = $validatedData['date'];
            $bonLivraison->id_pharmacien = $idPharmacien;
            $bonLivraison->id_chef = 1;
            $bonLivraison->id_ordonnance = $validatedData['id_ordonnance']; // Utilisation de l'ID de l'ordonnance
            $bonLivraison->save();

            Log::info('Bon de livraison créé :', $bonLivraison->toArray());

            $ordonnance = Ordonnance::find($validatedData['id_ordonnance']);
            if ($ordonnance) {
                $ordonnance->etat = 'livré';
                $ordonnance->save();
                Log::info('État de l\'ordonnance mis à jour à "livré" :', ['ordonnance_id' => $ordonnance->id]);
            } else {
                Log::warning('Aucune ordonnance trouvée avec l\'ID : ' . $validatedData['id_ordonnance']);
            }

            // Enregistrer les lignes de bon de livraison
            foreach ($validatedData['lignes'] as $index => $ligne) {
                Log::info('Ligne ' . $index . ':', $ligne);
                $nomCommercial = NomCommercial::where('id_commerc', $ligne['id_commerc'])->first();
                if (!$nomCommercial) {
                    throw new \Exception("NomCommercial non trouvé pour le commerçant: " . $ligne['id_commerc']);
                }

                // Créer la ligne de bon de livraison
                $ligneBonLivraison = new LigneBonLivraison();
                $ligneBonLivraison->id_commerc = $ligne['id_commerc'];
                $ligneBonLivraison->quantite_demandee = $ligne['quantite_demandee'];
                $ligneBonLivraison->quantite_livree = $ligne['quantite_livree'];
                $ligneBonLivraison->quantite_restante = $ligne['quantite_restante'];
                $ligneBonLivraison->prix_unit = $ligne['prix_unit'];
                $ligneBonLivraison->Montant = $ligne['Montant'];
                $ligneBonLivraison->id_bls = $bonLivraison->id;
                $ligneBonLivraison->save();

                Log::info('Ligne de bon de livraison créée :', $ligneBonLivraison->toArray());
            }

            DB::commit();
            return redirect()->back()->with('success', 'Bon de Livraison créé avec succès');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la création du bon de livraison :', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Erreur lors de la création du bon de livraison.'])->withInput();
        }
    }
    public function listeBonsDeLivraison()
    {
        if (Auth::check()) {
            $user = auth()->user();

            if ($user->pharmacist) {
                $bonsDeLivraison = BonLivraisonService::with(['ordonnance', 'bonCommande'])
                    ->get();

                return view('pharmacien.listebonlivraison', compact('bonsDeLivraison'));
            } else {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }
    }



    public function show($id)
    {
        $bonLivraison = BonlivraisonService::with([
            'lignes.nomCommercial.dci',
            'bonCommande', 'ordonnance'
        ])->findOrFail($id);

        return view('pharmacien.detailBonLivraison', compact('bonLivraison'));
    }
}
