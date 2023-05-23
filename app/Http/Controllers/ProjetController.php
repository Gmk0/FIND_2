<?php

namespace App\Http\Controllers;

use App\Models\ProjectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Livewire\Livewire;

class ProjetController extends Controller
{
    //

    public function ProjetEvolution($id, $idp)
    {

        $validatedData = Validator::make(['idp' => $idp, 'id' => $id], [
            'idp' => 'string',
            'id' => 'string',
        ]);

        // Vérifier si la validation a échoué
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData);
        }

        // Récupérer l'objet Order correspondant à l'ID
        $data = ProjectResponse::find($idp);




        if (!empty($data)) {
            // Retourner la vue avec les données $data

            if ($data->status == "accepter") {


                return view('test.projetEvolution')
                    ->with('data', $data);
            } else {

                return redirect()->back()->withErrors('Cette reponse n \'a pas ete valider');
            }






            // return view('freelance.commandeView', ['commande' => $data]);
        } else {
            // Rediriger en arrière si les données sont inexistantes
            return redirect()->back()->withErrors('Donnees incorrect');
        }
    }
}
