<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Models\BonCommandeFournisseur;
use App\Models\LigneBonCommandeFournisseur;
use App\Models\Pharmacist;
use App\Models\ChiefPharmacist;
use App\Models\BonCommandeService;
use App\Models\NomCommercial;
use App\Models\Dci;
use App\Models\Ordonnance;
use App\Models\BonlivraisonService;
use App\Models\LigneBonLivraison;
use App\Models\BonReception;
use App\Models\LigneBonReception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacienController extends Controller
{



//////////////bon de commande fournisseur
public function bonCF(){
    $dcis = Dci::all();
    foreach ($dcis as $dci) {
   $dci->quantite_restante = $dci->quantite_en_stock; // assuming 'quantite_stock' is the field in 'dci' table
   }

   //  $Pharmacien =auth()->user()->pharmacist;
   //  $idPhar = $Pharmacien->id;
   //  $chefpharmaciens = ChiefPharmacist::all();
   //  $idChefPharmacien = $chefpharmaciens->first()->id; // Choisir le premier nom commercial comme valeur par défaut, par exemple
// Obtenir l'utilisateur authentifié
$user = auth()->user();

// Vérifier si l'utilisateur est un pharmacien ou un chef pharmacien
if ($user->isPharmacist()) {
// Si l'utilisateur est un pharmacien
$idPhar = $user->pharmacist->id;
$idChefPharmacien = ChiefPharmacist::first()->id;
} elseif ($user->isChiefPharmacist()) {
// Si l'utilisateur est un chef pharmacien
$idPhar = Pharmacist::first()->id;; // ou l'ID d'un pharmacien par défaut si nécessaire
$idChefPharmacien = $user->chiefPharmacist->id;
}

return view('AjouterBCF', compact('dcis','idPhar','idChefPharmacien'));
}
public function createBonCommandeFournisseur(Request $request)
{
   //dd($request->all());

   $validatedData = $request->validate([
       //'num_bcf' => 'required|integer',
       'date' => 'required|date',
       'nom_service_contractant' => 'required|string',
       'nom_fournisseur' => 'required|string',
       'email_fournisseur' => 'required|email|unique:bon_commande_fournisseurs,email_fournisseur',
       'id_chef_pharmacien' => 'required|integer',
       'id_pharmacien' => 'required|integer',
       'lignesBCF' => 'required|array',
       'lignesBCF.*.id_dci' => 'required|integer',
       'lignesBCF.*.quantite_commandee' => 'required|integer',
       'lignesBCF.*.quantite_restante' => 'nullable|integer',
   ]);

   // Créer le bon de commande
   $bonCommande = BonCommandeFournisseur::create([
       // 'num_bcf' => $validatedData['num_bcf'],
       'date' => $validatedData['date'],
       'nom_service_contractant' => $validatedData['nom_service_contractant'],
       'nom_fournisseur' => $validatedData['nom_fournisseur'],
       'email_fournisseur' => $validatedData['email_fournisseur'],
       'id_chef_pharmacien' => $validatedData['id_chef_pharmacien'],
       'id_pharmacien' => $validatedData['id_pharmacien'],
   ]);


   foreach ($validatedData['lignesBCF'] as $ligne) {
       // Assuming 'IDdci' corresponds to the DCI ID for each line
       $ligne['id_bcf'] = $bonCommande->id;
       LigneBonCommandeFournisseur::create([
           'id_bcf' => $ligne['id_bcf'],
           'id_dci' => $ligne['id_dci'],
           'quantite_commandee' => $ligne['quantite_commandee'],
           'quantite_restante' => $ligne['quantite_restante'] ?? null,
       ]);
   }
   return redirect()->route('bonCF')->with('success', 'Bon de commande créé avec succès');
}


public function listeBonsDeCommandeFournisseur()
{
   $bonsCommande = BonCommandeFournisseur::with('lignesBCF')->get();
   return view('listeBCF', compact('bonsCommande'));
}

public function details($id)
{
$bonCommande = BonCommandeFournisseur::with('lignesBCF.dci')->findOrFail($id);
$dcis = Dci::all(); // Récupérer toutes les DCIs disponibles

return view('DetailsBCF',compact('bonCommande','dcis'));

}


///modifier bon
public function updateBCF(Request $request, $id)
{

$ligneBCF = LigneBonCommandeFournisseur::findOrFail($id);
$bonCommande = BonCommandeFournisseur::findOrFail($ligneBCF->id_bcf);

// Empêcher la modification si le bon est validé
if ($bonCommande->is_validated) {
   return redirect()->back()->with('error', 'Vous ne pouvez pas modifier un bon de commande validé.');
}


$validatedData = $request->validate([
   'dci' => 'required|integer',
   'quantite_commandee' => 'required|integer',
]);

$ligneBCF = LigneBonCommandeFournisseur::findOrFail($id);
$ligneBCF->id_dci = $validatedData['dci'];
$ligneBCF->quantite_commandee = $validatedData['quantite_commandee'];
$ligneBCF->save();

return redirect()->back()->with('success', 'Ligne modifiée avec succès.');

// return redirect()->route('DetailsBCF', ['id' => $ligneBCF->id_bcf])->with('success', 'Ligne modifiée avec succès');
}
///////valider bon

public function validerBonCommandeFournisseur($id)
{
$bonCommande = BonCommandeFournisseur::findOrFail($id);

// Vérifiez si l'utilisateur est un pharmacien chef
if (!auth()->user()->isChiefPharmacist()) {
   return redirect()->back()->with('error', 'Seul un pharmacien chef peut valider un bon de commande.');
}

$bonCommande->is_validated = true;
$bonCommande->save();


return redirect()->back()->with('success', 'Ligne validé avec succès.');

// return redirect()->route('DetailsBCF', ['id' => $id])->with('success', 'Bon de commande validé avec succès.');
}

////////////bon de reception//////////////////////////////////////////////
public function bonCR($id_bcf){

    $user = auth()->user();

// Vérifier si l'utilisateur est un pharmacien ou un chef pharmacien
if ($user->isPharmacist()) {
// Si l'utilisateur est un pharmacien
$idPhar = $user->pharmacist->id;
$idChefPharmacien = ChiefPharmacist::first()->id;
} elseif ($user->isChiefPharmacist()) {
// Si l'utilisateur est un chef pharmacien
$idPhar = Pharmacist::first()->id;; // ou l'ID d'un pharmacien par défaut si nécessaire
$idChefPharmacien = $user->chiefPharmacist->id;
}

    // $Pharmacien =auth()->user()->pharmacist;
    //      $idPhar = $Pharmacien->id;
    //      $chefpharmaciens = ChiefPharmacist::all();
    //      $idChefPharmacien = $chefpharmaciens->first()->id; // Choisir le premier nom commercial comme valeur par défaut, par exemple
    $date_reception= Carbon::now();


    $bonCommande = BonCommandeFournisseur::with('lignesBCF.dci.nomCommercial')->findOrFail($id_bcf);

    return view('AjouterBR',compact('bonCommande','date_reception','idPhar','idChefPharmacien'));
}

 public function createBonCommandeReception(Request $request)
 {
    // Validez les données de la requête
    $validatedData = $request->validate([
        'num_livraison'=> 'required|string',
        'date_reception' => 'required|date',
        'date_livraison' => 'required|date',
        'id_chef_pharmacien' => 'required|integer',
        'id_pharmacien' => 'required|integer',
        'id_bcf' => 'required|exists:bon_commande_fournisseurs,id',
        'lignesBR' => 'required|array',
        'lignesBR.*.numero_lot' => 'required|string',
        'lignesBR.*.date_peremption' => 'required|date',
        'lignesBR.*.quantite_recue' => 'required|integer',
        'lignesBR.*.quantite_restante' => 'required|integer',
        'lignesBR.*.prix_unitaire' => 'required|numeric',
        'lignesBR.*.montant' => 'required|numeric',
        'lignesBR.*.id_commerc' => 'required|exists:nom_commercial,id_commerc',
    ]);


 // Check if a reception already exists for the given bon de commande
  $existingBonReception = BonReception::where('id_bcf', $validatedData['id_bcf'])->first();
  if ($existingBonReception) {
      return redirect()->back()->with('error', 'Un bon de réception existe déjà pour ce bon de commande fournisseur.');
 }
// Créez le bon de réception
$bonReception = BonReception::create([
    'num_livraison' => $validatedData['num_livraison'],
    'date_livraison' => $validatedData['date_livraison'],
     'date_reception' => $validatedData['date_reception'],
     'date_livraison' => $validatedData['date_livraison'],
     'id_bcf' => $validatedData['id_bcf'],
     'id_chef_pharmacien' => $validatedData['id_chef_pharmacien'],
     'id_pharmacien' => $validatedData['id_pharmacien'],
]);
// Créez les lignes de bon de réception
foreach ($validatedData['lignesBR'] as $ligne) {
    LigneBonReception::create([
        'numero_lot' => $ligne['numero_lot'],
        'date_peremption' => $ligne['date_peremption'],
        'quantite_recue' => $ligne['quantite_recue'],
        'quantite_restante' => $ligne['quantite_restante'],
        'prix_unitaire' => $ligne['prix_unitaire'],
        'montant' => $ligne['montant'],
        'id_br' => $bonReception->id,
        'id_commerc' => $ligne['id_commerc'],
    ]);
}

 return redirect()->route('bonCR', ['id_bcf' => $validatedData['id_bcf']])->with('success', 'Bon de réception créé avec succès');

  }


 public function listeBonsReception()
 {
    $bonReception = BonReception::with('lignesBR.ligneBonCommandeFournisseur')->get();
     return view('listeBR', compact('bonReception'));
 }

 public function detailsBR($id)
 {
    $bonReception = BonReception::with(['lignesBR.ligneBonCommandeFournisseur.dci', 'lignesBR.nomCommercial'])->findOrFail($id);

     //$bonReception = BonReception::with('lignesBR')->findOrFail($id);

      return view('DetailsBCR',compact('bonReception'));

 }



































    //bon de livraison
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
