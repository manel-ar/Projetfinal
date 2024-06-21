<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BonCommandeService;
use App\Models\LigneBonCommandeService;
use App\Models\NomCommercial;
use App\Models\service;
use App\Models\BonLivraisonService;
use App\Models\Ordonnance;
use App\Models\LigneOrdonnance;
use App\Models\Pharmacist;
use App\Models\Dci;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class MedecinController extends Controller
{

    public function bondecommande()
    {
        $dcis = Dci::all();
        $services = Service::all();

        // Récupérer l'ID du premier pharmacien
        $idPharmacien = Pharmacist::first()->id;

        // Récupérer l'ID et le nom du premier médecin associé à l'utilisateur authentifié
        $medecin = auth()->user()->doctor;
        $idMedecin = $medecin->id;
        $nomMedecin = auth()->user()->name;

        // Initialisation de l'ID commercial par défaut
        $idCommerc = $dcis->first()->id_commerc;

        return view('bondecommande', compact('dcis', 'services', 'idPharmacien', 'idMedecin', 'idCommerc', 'nomMedecin'));
    }
    public function storeBonDeCommande(Request $request)
    {
        $validatedData = $request->validate([
            'id_phar' => 'required|integer',
            'id_doc' => 'required|integer',
            'service_id' => 'required|integer',
            'date' => 'required|date',
            'lignes' => 'required|array',
            'lignes.*.id_dci' => 'required|integer',
            'lignes.*.quantite_demandee' => 'required|integer',
            'lignes.*.quantite_restante' => 'nullable|integer',
        ]);

        // Récupération dynamique de id_commerc pour chaque ligne
        foreach ($validatedData['lignes'] as &$ligne) {
            $ligne['id_commerc'] = $this->getIdCommercForLine($ligne['id_dci']); // Appel à une méthode pour récupérer id_commerc
        }

        // Création du bon de commande principal
        $bonCommandeService = BonCommandeService::create([
            'id_phar' => $validatedData['id_phar'],
            'id_doc' => $validatedData['id_doc'],
            'service_id' => $validatedData['service_id'],
            'date' => $validatedData['date'],
        ]);
        foreach ($validatedData['lignes'] as $ligneData) {
            $id_commerc = $this->getIdCommercForLine($ligneData['id_dci']);

            LigneBonCommandeService::create([
                'id_bcs' => $bonCommandeService->id,
                'id_commerc' => $id_commerc,
                'quantite_demandee' => $ligneData['quantite_demandee'],
                'quantite_restante' => $ligneData['quantite_restante'],
            ]);
        }



        return redirect()->route('bondecommande')->with('success', 'Bon de commande créé avec succès');
    }

    protected function getIdCommercForLine($id_dci)
    {
        $dci = Dci::findOrFail($id_dci);
    
        $nomCommercial = $dci->nomCommercial->first(); // Sélectionne le premier élément de la collection
    
        if ($nomCommercial) {
            return $nomCommercial->id_commerc;
        } else {
            // Gestion d'une situation où nomCommercial est null ou inexistant
            // Retourner une valeur par défaut ou gérer l'erreur selon votre cas d'utilisation
            // Exemple: retourner une valeur par défaut
            return 1; // Remplacez par une valeur appropriée
        }
    }
    

    public function listeBonsDeCommandeMedecin()
    {
        $user = auth()->user();

        // Vérifier si l'utilisateur est un médecin
        if ($user->doctor) {
            // Récupérer l'ID du médecin
            $idMedecin = $user->doctor->id;

            // Récupérer les bons de commande du médecin avec les lignes et les informations des DCI
            $bonsDeCommande = BonCommandeService::where('id_doc', $idMedecin)
                ->with('lignes.nomCommercial.dci', 'medecin.user')
                ->get();

            return view('liste', compact('bonsDeCommande'));
        } else {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }
    // details

    public function getbon($id)
    {
        $bonDeCommande = BonCommandeService::with('lignes.nomCommercial.dci', 'medecin.user', 'service')->findOrFail($id);

        $dcis = DCI::all();

        return view('detailboncommande', compact('bonDeCommande', 'dcis'));
    }

    // modif
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'lignes.*.dci' => 'required|string|max:255',
            'lignes.*.quantite_demandee' => 'required|integer|min:0',
            'lignes.*.quantite_restante' => 'required|integer|min:0',
        ]);
    
        $bonDeCommande = BonCommandeService::findOrFail($id);
    
        // Vérifier si le bon de commande est déjà livré
        if ($bonDeCommande->etat === 'livré') {
            return redirect()->back()->with('error', 'Vous ne pouvez pas modifier un bon de commande déjà livré.');
        }
    
        $bonDeCommande->date = $request->input('date');
        $bonDeCommande->save();
    
        foreach ($request->input('lignes') as $ligneId => $ligneData) {
            $ligne = LigneBonCommandeService::findOrFail($ligneId);
            
            // Mettre à jour la DCI
            $nomCommercial = $ligne->nomCommercial;
            $nomCommercial->id_dci = $ligneData['dci']; // Supposons que $ligneData['dci'] contient l'ID de la nouvelle DCI
            $nomCommercial->save();
            $ligne->quantite_demandee = $ligneData['quantite_demandee'];
            $ligne->quantite_restante = $ligneData['quantite_restante'];
            $ligne->save();
        }
    
        return redirect()->back()->with('success', 'Bon de Commande mis à jour avec succès');
    }
    
    // ordonnance

    public function create()
    {
        $services = Service::all();
        $dcis = DCI::all();
        return view('ordonnance', compact('services', 'dcis'));
    }

    // Méthode pour enregistrer une nouvelle ordonnance
    public function store(Request $request)
    {
        $user = auth()->user();

        // Valider les données du formulaire
        $request->validate([
            'nom_patient' => 'required|string|max:55',
            'prenom_patient' => 'required|string|max:55',
            'age' => 'required|integer',
            'date' => 'required|date',
            'service' => 'required|exists:services,id',
            'quantite_demandee' => 'required|array',
            'quantite_demandee.*' => 'required|integer|min:1',
            'posologie' => 'required|array',
            'posologie.*' => 'required|string',
            'duree' => 'required|array',
            'duree.*' => 'required|string',
            'dci' => 'required|array',
            'dci.*' => 'required|exists:dci,id',
        ]);

        if ($user->doctor) {
            // Récupérer le premier id_bcs existant
            $firstBcsId = BonCommandeService::first()->id;

            // Créer l'ordonnance
            $ordonnance = new Ordonnance([
                'nom_patient' => $request->input('nom_patient'),
                'prenom_patient' => $request->input('prenom_patient'),
                'age' => $request->input('age'),
                'id_bcs' => $firstBcsId,
                'date' => $request->input('date'),
                'id_service' => $request->input('service'),
                'id_doc' => $user->doctor->id,
            ]);

            $ordonnance->save();

            $quantites = $request->input('quantite_demandee');
            $posologies = $request->input('posologie');
            $durees = $request->input('duree');
            $dcis = $request->input('dci');

            // Créer et sauvegarder chaque ligne d'ordonnance associée à l'ordonnance
            for ($i = 0; $i < count($quantites); $i++) {
                // Récupérer le NomCommercial correspondant à la DCI
                $nomCommercial = NomCommercial::where('id_dci', $dcis[$i])->first();
                if ($nomCommercial) {
                    $ligneOrdonnance = new LigneOrdonnance([
                        'id_ord' => $ordonnance->id,
                        'id_commerc' => $nomCommercial->id_commerc, // Utiliser l'id_commerc correspondant
                        'quantite_demandee' => $quantites[$i],
                        'posologie' => $posologies[$i],
                        'duree' => $durees[$i],
                        'id_dci' => $dcis[$i],
                    ]);
                    $ligneOrdonnance->save();
                } else {
                    // Gérer le cas où aucun NomCommercial n'est trouvé pour la DCI donnée
                    // Vous pouvez choisir de lever une exception ou de gérer autrement cette situation
                    throw new \Exception("NomCommercial non trouvé pour la DCI: " . $dcis[$i]);
                }
            }
        }

        return redirect()->route('ordonnance.create')->with('success', 'Ordonnance enregistrée avec succès');
    }
    // modif ord
    public function updateord(Request $request, $id)
    {
        // Valider les données de la requête
        $request->validate([
            'date' => 'required|date',
            'nom_patient' => 'required|string|max:255',
            'prenom_patient' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'lignes.*.dci' => 'required|exists:dci,id',
            'lignes.*.quantite_demandee' => 'required|integer|min:0',
            'lignes.*.posologie' => 'nullable|string|max:255',
            'lignes.*.duree' => 'nullable|string|max:255',
        ]);

        // Trouver l'ordonnance à mettre à jour
        $ordonnance = Ordonnance::findOrFail($id);

        // Vérifier l'état de l'ordonnance
        if ($ordonnance->etat === 'livré') {
            return redirect()->back()->with('error', 'Vous ne pouvez pas modifier une ordonnance déjà livrée.');
        }

        $ordonnance->nom_patient = $request->input('nom_patient');
        $ordonnance->prenom_patient = $request->input('prenom_patient');
        $ordonnance->age = $request->input('age');
        $ordonnance->date = $request->input('date');
        $ordonnance->save();

        // Mettre à jour les lignes de l'ordonnance
        foreach ($request->input('lignes') as $key => $ligneData) {
            $ligne = LigneOrdonnance::findOrFail($key); // $key correspond à l'id de la ligne
            $nomCommercial = NomCommercial::where('id_dci', $ligneData['dci'])->first();

            if ($nomCommercial) {
                $ligne->id_commerc = $nomCommercial->id_commerc;
                $ligne->quantite_demandee = $ligneData['quantite_demandee'];
                $ligne->posologie = $ligneData['posologie'] ?? '';
                $ligne->duree = $ligneData['duree'] ?? '';
                $ligne->save();
            } else {
                return redirect()->back()->with('error', 'Aucun nom commercial trouvé pour le DCI sélectionné.');
            }
        }

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Ordonnance mise à jour avec succès.');
    }




    public function listeOrdonnances()
    {
        $user = auth()->user();

        // Vérifiez si l'utilisateur est un médecin
        if ($user->doctor) {
            $idMedecin = $user->doctor->id;
            $dcis = Dci::all();
            $ordonnances = Ordonnance::where('id_doc', $idMedecin)
                ->with('lignes.nomCommercial.dci') // Chargez les relations nécessaires
                ->get();

            return view('listeordonnance', compact('ordonnances', 'dcis'));
        } else {
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }
    }
    public function show($id)
    {
        $ordonnance = Ordonnance::with(['lignes.nomCommercial.dci', 'medecin', 'service'])->findOrFail($id);
        $medecin = Auth::user()->doctor;
        $dcis = Dci::all();

        foreach ($ordonnance->lignes as $ligne) {
            if (!$ligne->nomCommercial || !$ligne->nomCommercial->dci) {
                Log::error('Données manquantes pour la ligne d\'ordonnance', ['ligne' => $ligne->toArray()]);
            }
        }

        return view('ordonnances', compact('ordonnance', 'medecin', 'dcis'));
    }


    public function listeBonsDeLivraison()
    {
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            $user = auth()->user();
            if ($user->doctor) {
                $bonsDeLivraison = BonLivraisonService::with(['ordonnance', 'bonCommande'])
                    ->get();
                return view('medecin.listeBonLivraison', compact('bonsDeLivraison'));
            } else {
                return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à cette page.');
        }
    }

    public function showBonLivraison($id)
    {
        $bonLivraison = BonlivraisonService::with([
            'lignes.nomCommercial.dci',
            'bonCommande', 'ordonnance'
        ])->findOrFail($id);
        return view('medecin.detailBonLivraison', compact('bonLivraison'));
    }
}
