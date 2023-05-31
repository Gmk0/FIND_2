<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectResponse;
use App\Models\Transaction;
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
            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
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

    public function ProjetCheckout($id, $idp)
    {
        $validatedData = Validator::make(['idp' => $idp, 'id' => $id], [
            'idp' => 'string',
            'id' => 'string',
        ]);

        // Vérifier si la validation a échoué
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
        }

        $projet = Project::find($id);

        if (!empty($projet) && ($projet->is_paid == "en attente") && ($projet->user_id == auth()->id())) {

            $data = ProjectResponse::find($idp);

            if (!empty($projet) && ($projet->is_paid == "en attente")) {

                return view('user.projet.checkoutProjet', ['data' => $data]);
            } else {
                return redirect()->back()->withErrors('Cette reponse n \'a pas ete valider');
            }
        } else {
            return redirect()->back()->withErrors('Cette reponse n \'a pas ete valider');
        }
    }

    public function ProjeProposition($id)
    {
        $validatedData = Validator::make(['id' => $id], [

            'id' => 'string',
        ]);


        if ($validatedData->fails()) {
            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
        }

        $projet = Project::find($id);

        if (!empty($projet) && ($projet->user_id == auth()->id())) {

            return view('user.projet.Projetproposition', ['data' => $projet]);
        } else {

            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
        }
    }

    public function ProjeViewFreelance($id)
    {
        $validatedData = Validator::make(['id' => $id], [

            'id' => 'string',
        ]);


        if ($validatedData->fails()) {
            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
        }

        $projet = Project::find($id);

        if (!empty($projet) && ($projet->status == "en attente")) {

            return view('freelance.missionView', ['data' => $projet]);
        } else {

            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
        }
    }
    public function ProjetCheckoutStatus($idP, $transation_numero)
    {
        $validatedData = Validator::make(['idp' => $idP, 'transation_numero' => $transation_numero], [

            'transation_numero' => 'string',
            'idp' => 'string',
        ]);


        if ($validatedData->fails()) {
            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
        }

        $transaction = Transaction::where('transaction_numero', $transation_numero)->first();



        if (!empty($transaction) && ($transaction->status == "successfull")) {

            $response = ProjectResponse::find($idP);

            $response->is_paid = "payer";
            $response->update();


            $projet = Project::findorFail($response->project_id);

            $projet->transaction_id = $transaction->id;
            $projet->is_paid
                = "payer";

            $projet->update();

            return view('user.projet.statusPaiement', ['response' => $response]);
        } else {

            return redirect('/user')->withErrors(['requete' => "erreur de requete"]);
        }
    }

    public function ProjetCheckoutMaxiCash()
    {

        // Récupérer les données de la requête de confirmation de paiement
        $status = request('status');
        $reference = request('reference');
        $method = request('Method');

        if ($status === 'failed') {

            $transaction = Transaction::where('payment_token', $reference)->first();

            $transaction->status = 'failed';

            $transaction->update();



            return redirect()->route('checkout')->withErrors(['message' => 'Une erreur s\'est produite.']);
        } else if ($status === "success") {
        }
    }


    public function ProjeViewFreealance($id)
    {
        $validatedData = Validator::make(['id' => $id], [

            'id' => 'string',
        ]);


        if ($validatedData->fails()) {
            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
        }

        $projectResponse = ProjectResponse::find($id);

        $projet = Project::where('id', $projectResponse->project_id)->first();



        if (!empty($projectResponse) &&  !empty($projet)) {

            return view('freelance.ProjetWork', ['projectResponse' => $projectResponse, 'projet' => $projet]);
        } else {

            return redirect()->back()->withErrors(['requete' => "erreur de requete"]);
        }
    }
}
