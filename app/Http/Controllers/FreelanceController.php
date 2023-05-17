<?php

namespace App\Http\Controllers;

use App\Models\Freelance;
use Illuminate\Http\Request;

class FreelanceController extends Controller
{
    //



    public function portfolio($identifiant)
    {

        $freelance = Freelance::where('identifiant', $identifiant)->first();


        if ($freelance != null) {
            // Retourner la vue avec les données $data
            return view('user.portfolio', ['Freelance' => $freelance]);
        } else {
            // Rediriger en arrière si les données sont inexistantes
            return redirect()->back();
        }
    }
}
