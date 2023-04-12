<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommandeControler extends Controller
{
    //

    public function commandeOne($id)
    {

        $validatedData = Validator::make(['id' => $id], [
            'id' => 'numeric',
        ]);

        // Vérifier si la validation a échoué
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        // Récupérer l'objet Order correspondant à l'ID
        $data = Order::find($id);

        if (!empty($data)) {
            // Retourner la vue avec les données $data
            return view('freelance.commandeView', ['commande' => $data]);
        } else {
            // Rediriger en arrière si les données sont inexistantes
            return redirect()->back();
        }
    }
}
