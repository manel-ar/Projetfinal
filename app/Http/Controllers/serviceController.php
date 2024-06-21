<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class serviceController extends Controller
{

    //  public function getServices(){
    //      return view('ajouterService');
    // }
    public function listeServices(Request $request){

        $data= service::all();
        return view('listeService',compact('data'));
    }
    public function getService(Request $request){
        return view('ajouterService');

    }

        public function store(Request $request)
        {
            // Validation des données
            $validated = $request->validate([
                'id' =>'required|integer',
                'nom_service' => 'required|string|max:255',
            ]);

            Service::create($validated);


            // Retourner une réponse (par exemple, le service créé)
           //return response()->json($service, 201);
           //return redirect()->route('getAddUser')->with('success', 'Votre ajout a été effectuée avec succès.');

         return redirect()->route('getService')->with('success', 'Le service a été ajouté avec succès.');
    }
        //  public function edit($id)
        //  {
        //      $service = Service::findOrFail($id);
        //      return view('editService', compact('service'));
        //  }
         public function updateService(Request $request, $id)
         {
         // Validez les données du formulaire
         $validatedData = $request->validate([
          'id'=>'required|integer',
          'nom_service' => 'required|string|max:255',

         ]);

         // Trouvez le service par son ID et mettez à jour les données
$service = Service::findOrFail($id);
$service->id = $validatedData['id'];
$service->nom_service = $validatedData['nom_service'];

         $service = Service::findOrFail($id);
         $service->update($validatedData);

          // Mettre à jour le service
       // $service->update($validated);

        return redirect()->route('listeServices', $id)->with('success', 'Le service a été mis à jour avec succès.');


        }


        public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        //return response()->json(['success' => 'Service supprimé avec succès']);
        return redirect()->route('listeServices')->with('success', 'Service supprimé avec succès');
    }



    }







