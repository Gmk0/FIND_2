<?php

namespace App\Http\Controllers;

use App\Models\Favori;
use App\Models\Service;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

class ToolsController extends Controller
{
    //

    public function like(Request $request)
    {
        $user = auth()->user();
        dd($request->service_id); // Récupérer l'utilisateur authentifié
        $product = Service::find($request->service_id); // Récupérer le produit à liker

        if (!$product) {
            return response()->json(['message' => 'Produit introuvable'], 404);
        }

        // Vérifier si l'utilisateur a déjà liké le produit
        $existingLike = Favori::where('user_id', $user->id)
            ->where('service_id', $product->id)
            ->first();

        if ($existingLike) {
            return response()->json(['message' => 'Vous avez déjà liké ce produit'], 400);
        }

        // Enregistrer le like
        $like = new Favori(['user_id' => $user->id, 'service_id' => $product->id]);
        $like->save();

        return response()->json(['message' => 'Produit liké avec succès'], 200);
    }

    public function facture($facture)
    {



        // dd($facture);
        $order = Transaction::where('transaction_numero', $facture)->first();




        if (!$order) {
            return redirect()->back()->withErrors(['message' => 'Une erreur s\'est produite.']);
        }

        // Créer une nouvelle instance de Dompdf
        $dompdf = new Dompdf();

        // Charger la vue Blade avec les données
        $view = view('Report.facture', [
            'order' => $order,
        ]);

        // Rendre la vue en HTML
        $html = $view->render();

        // Charger le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Générer le PDF
        $dompdf->render();

        // Récupérer le contenu du PDF généré
        $pdfContent = $dompdf->output();

        // Retourner le PDF dans une réponse HTTP
        return response($pdfContent, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="mon-pdf.pdf"');
    }

    public function paiment_status($transaction_numero)
    {

        $transaction = Transaction::where('transaction_numero', $transaction_numero)->first();

        if (!$transaction) {
            return redirect()->back()->withErrors(['message' => 'Une erreur s\'est produite.']);
        }

        return view('status.success', ['transaction' => $transaction]);
    }


    public function Report()
    {



        // dd($facture);
        $transaction = Transaction::where('user_id', auth()->id())->get();






        if (!$transaction) {
            return redirect()->back()->withErrors(['message' => 'Une erreur s\'est produite.']);
        }

        // Créer une nouvelle instance de Dompdf
        $dompdf = new Dompdf();

        // Charger la vue Blade avec les données
        $view = view('Report.transactionReport', [
            'transactionsUser' => $transaction,
        ]);

        // Rendre la vue en HTML
        $html = $view->render();

        // Charger le contenu HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Générer le PDF
        $dompdf->render();

        // Récupérer le contenu du PDF généré
        $pdfContent = $dompdf->output();

        // Retourner le PDF dans une réponse HTTP
        return response($pdfContent, 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="transaction.pdf"');
    }
}
