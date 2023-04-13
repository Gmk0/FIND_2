<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use App\Models\Freelance;


class ServiceController extends Controller
{



    public function services()
    {

        $category = Category::all();

        $servicesBest = Service::where('category_id', 1)->limit(20)->get();

        $freelance = Freelance::paginate(20);

        $services = Service::orderBy('basic_price', 'Asc')->paginate(8);



        return view('user.services', [
            'categories' => $category,
            'servicesBest' => $servicesBest,
            'freelances' => $freelance,
            'services' => $services,
        ]);
    }

    public function categories()
    {
        $category = Category::all();


        return view('user.category', [
            'categories' => $category
        ]);
    }

    public function categoryByName(Request $request)
    {

        $category = $request->route('category');


        return view('user.servicesByCategory', [
            'category' => $category
        ]);
    }

    public function checkout()
    {
        // Récupérer les données de la requête de confirmation de paiement
        $status = request('status');
        $reference = request('reference');
        $method = request('Method');
        // Ajouter d'autres paramètres de la requête que vous souhaitez traiter

        // Vérifier le statut de paiement
        if ($status === 'failed') {
            // Le paiement a échoué, vous pouvez effectuer les actions nécessaires ici
            // par exemple, afficher un message d'erreur, enregistrer le statut du paiement dans la base de données, etc.

            // Rediriger vers une page d'échec
            return redirect()->route('checkout')->withErrors(['message' => 'Une erreur s\'est produite.']);
        } else {


            // Le statut de paiement est inconnu ou ne nécessite aucune action particulière
            // Vous pouvez ajouter d'autres conditions de traitement en fonction de vos besoins

            // Rediriger vers une page par défaut
            return redirect()->route('checkout')->withErrors(['message' => 'Une erreur s\'est produite.']);
        }
    }
}
