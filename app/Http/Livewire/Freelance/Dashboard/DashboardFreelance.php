<?php

namespace App\Http\Livewire\Freelance\Dashboard;

use Livewire\Component;
use App\Models\Conversation;
use App\Models\Freelance;
use App\Models\Order;
use App\Models\service;
use App\Models\Transaction;
use App\Models\Notification;
use Carbon\Carbon;
use WireUi\Traits\Actions;
use App\Events\OrderCreated;
use App\Models\ProjectResponse;

class DashboardFreelance extends Component
{

    use Actions;
    public $service;
    public $orders;
    public $transaction;
    public $freelance_id;
    public $notifications;


    public function mount()
    {
        $this->freelance_id = auth()->user()->freelance->id;
        // $donne =
        // dd($donne);
    }



    public function  getListeners()
    {

        $auth_id = auth()->user()->id;
        return [
            "echo-private:notify.{$auth_id},ProjectResponse" => 'broadcastedMessageReceived',
            "echo-private:notify.{$auth_id},OrderCreated" => '$refresh',
            'ServiceOrdered' => '$refresh',


        ];
    }





    public function total()
    {
        $dateDebut = Carbon::now()->startOfMonth();
        $dateFin = Carbon::now()->endOfMonth();

        $freelance_id = $this->freelance_id;
        // Récupérer toutes les transactions qui ont eu lieu dans le mois en cours
        $transactions = order::whereHas('service', function ($query) use ($freelance_id) {
            $query->where('freelance_id', $freelance_id);
        })->where('status', 'completed')->whereBetween('created_at', [$dateDebut, $dateFin])
            ->sum('total_amount');

        $projet = ProjectResponse::where('freelance_id', $freelance_id)->where('is_paid', 'payer')->sum('bid_amount');

        // Calculer le total de tous les montants des transactions trouvées
        /* $transactions = $transactions->map(function ($transaction) {
            $transaction->total_amount = $transaction->total_amount;
            return $transaction;
        }); */

        // Calculer le total de tous les montants des transactions trouvées
        $total = '$' . number_format($transactions + $projet, 2, ',', ' ');
        return $total;
    }

    public function OrderWeek()
    {

        $date = Carbon::now()->subDays(7);

        // Récupérer toutes les commandes créées au cours des 7 derniers jours


        $freelance_id = $this->freelance_id;

        $orders = Order::whereHas('service', function ($query) use ($freelance_id) {
            $query->where('freelance_id', $freelance_id);
        })->whereBetween('created_at', [$date, Carbon::now()])->get();


        // Compter le nombre de commandes trouvées
        return  $nombreDeTransactions = $orders->count();
    }

    public function conversations()
    {


        // Récupérer l'ID du freelance
        $freelanceId = auth()->user()->freelance->id;

        // Définir la date d'il y a 7 jours
        $date = Carbon::now()->subDays(7);

        // Récupérer toutes les conversations qui ont eu lieu au cours des 7 derniers jours
        $conversations = Conversation::whereBetween('created_at', [$date, Carbon::now()])
            ->where('freelance_id', $freelanceId)
            ->pluck('user_id');

        // Compter le nombre d'utilisateurs uniques avec lesquels le freelance a interagi
        return $nombreUtilisateurs = $conversations->unique()->count();
    }



    function pourcentageChangementMoisPrecedent()
    {
        $freelance_id = $this->freelance_id;

        $debutMoisEnCours = Carbon::now()->startOfMonth();
        $finMoisEnCours = Carbon::now()->endOfMonth();
        $debutMoisPrecedent = Carbon::now()->subMonth()->startOfMonth();
        $finMoisPrecedent = Carbon::now()->subMonth()->endOfMonth();


        $totalArgentMoisEnCours = Order::whereHas('service', function ($query) use ($freelance_id) {
            $query->where('freelance_id', $freelance_id);
        })
            ->whereBetween('created_at', [$debutMoisEnCours, $finMoisEnCours])
            ->sum('total_amount');

        $totalArgentMoisPrecedent = Order::whereHas('service', function ($query) use ($freelance_id) {
            $query->where('freelance_id', $freelance_id);
        })
            ->whereBetween('created_at', [$debutMoisPrecedent, $finMoisPrecedent])
            ->sum('total_amount');

        $diffArgent = $totalArgentMoisEnCours - $totalArgentMoisPrecedent;

        // Calculer le pourcentage de changement
        if ($totalArgentMoisPrecedent != 0) {
            $pourcentageChangement = ($diffArgent / $totalArgentMoisPrecedent) * 100;
        } else {
            $pourcentageChangement = 0;
        }

        return $pourcentageChangement;
    }

    function calculateTransactionsEvolution()
    {
        $freelance_id = $this->freelance_id;

        $date = Carbon::now()->subDays(7);

        // Récupérer toutes les commandes créées au cours des 7 derniers jours
        $this->orders = Order::whereHas('service', function ($query) use ($freelance_id) {
            $query->where('freelance_id', $freelance_id);
        })->whereBetween('created_at', [$date, Carbon::now()])->get();

        // Compter le nombre de commandes trouvées
        $nombreDeTransactions = $this->orders->count();

        // Récupérer le nombre de commandes créées lors de la semaine précédente
        $nombreDeTransactionsSemainePrecedente = Order::whereHas('service', function ($query) use ($freelance_id) {
            $query->where('freelance_id', $freelance_id);
        })->whereBetween('created_at', [$date->subDays(7), $date])->count();

        // Calculer l'évolution en pourcentage
        if ($nombreDeTransactionsSemainePrecedente != 0) {
            $pourcentageEvolution = (($nombreDeTransactions - $nombreDeTransactionsSemainePrecedente) / $nombreDeTransactionsSemainePrecedente) * 100;
        } else {
            $pourcentageEvolution = 0;
        };

        return $pourcentageEvolution;
    }
    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications;

        return view('livewire.freelance.dashboard.dashboard-freelance', [
            'amount' => $this->total(),
            'order' => Order::whereHas('service', function ($query) {
                $query->where('freelance_id', $this->freelance_id);
            })->paginate(10),
            'orderCount' => $this->OrderWeek(),

            'conversations' => $this->conversations(),
            'schedules' =>  $this->servicesCommandesTermines(),
            "percentTransaction" => $this->pourcentageChangementMoisPrecedent(),
            'orderEvolution' => $this->calculateTransactionsEvolution(),
        ]);
    }

    // Modèle Freelance.php

    public function servicesCommandesTermines()
    {
        return
            Order::whereHas('service', function ($query) {
                $query->where('freelance_id', $this->freelance_id); // Ajoutez cette condition pour vérifier que la progression n'est pas de 100%
            })->where('status', 'completed')
            ->where('progress', '<', 100)
            ->get();;
    }
}
