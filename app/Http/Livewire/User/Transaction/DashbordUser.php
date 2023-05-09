<?php

namespace App\Http\Livewire\User\Transaction;

use App\Models\Conversation;
use App\Models\Order;
use App\Models\Project;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\{ToggleColumn, BadgeColumn, TextColumn};
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Forms;
use Filament\Tables\Filters\Filter;

use Filament\Tables\Actions\{BulkAction, Action};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DashbordUser extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;
    public $service;
    public $orders;
    public $transaction;
    public $user_id;





    public function mount()
    {
        $this->user_id = auth()->user()->id;
        // $donne =
        // dd($donne);
    }

    public function getTransac()
    {


        $order = Transaction::whereHas('orders', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();
    }

    protected function getTableQuery(): Builder
    {

        // $freelance = freelance::where('user_id', Auth::user()->id)->first();


        $order = Order::query();
        // Créer une requête pour la table "Service"
        $order->where('user_id', auth()->user()->id)

            ->orderBy('created_at', 'DESC')
            ->get();


        // Ajouter une condition pour l'utilisateur connecté

        // Retourner la requête
        return $order;
    }

    protected function getTableColumns(): array
    {
        return [

            Split::make([
                Tables\Columns\TextColumn::make('transaction.transaction_numero')->description('Transaction'),
                Tables\Columns\TextColumn::make('service.title')->description('service')->visibleFrom('lg'),
                Tables\Columns\TextColumn::make('total_amount')->description('Montant'),
                BadgeColumn::make('status')
                    ->enum([
                        'completed' => 'Payer',
                        'pending' => 'en Attente',
                        'rejeted' => 'Rejeter',
                    ])->colors([

                        'warning' => static fn ($state): bool => $state === 'pending',
                        'success' => static fn ($state): bool => $state === 'completed',
                        'danger' => static fn ($state): bool => $state === 'rejeted',
                    ]),
            ]),
            Panel::make([
                Stack::make([
                    Tables\Columns\TextColumn::make('service.title')->description('service')->visibleFrom('md'),
                    Tables\Columns\TextColumn::make('user.name')->description('client'),
                    Tables\Columns\TextColumn::make('created_at')->description('date'),

                ]),
            ])->collapsible(),





        ];
    }



    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('status')
                ->options([
                    'completed' => 'completed',
                    'pending' => 'pending',
                    'rejeted' => 'rejeted',
                ])
                ->attribute('status'),

        ];
    }
    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function getTableActions(): array
    {
        return [
            // ...
            Action::make('Voir')
                ->url(fn (Order $record): string => route('commandeOneView', $record->id))
                ->openUrlInNewTab()
                ->tooltip('Voir transaction')
                ->icon('heroicon-s-pencil'),






        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [5, 15, 25, 100];
    }


    public function total()
    {
        $dateDebut = Carbon::now()->startOfMonth();
        $dateFin = Carbon::now()->endOfMonth();

        $user_id = $this->user_id;
        // Récupérer toutes les transactions qui ont eu lieu dans le mois en cours
        $transactions = Order::where('user_id', $user_id)
            ->where('status', 'completed')->whereBetween('created_at', [$dateDebut, $dateFin])->sum('total_amount');

        // Calculer le total de tous les montants des transactions trouvées
        /* $transactions = $transactions->map(function ($transaction) {
            $transaction->total_amount = $transaction->total_amount;
            return $transaction;
        }); */

        // Calculer le total de tous les montants des transactions trouvées
        $total = '$' . number_format($transactions, 2, ',', ' ');
        return $total;
    }

    public function OrderWeek()
    {

        $date = Carbon::now()->subDays(7);

        // Récupérer toutes les commandes créées au cours des 7 derniers jours


        $user_id = $this->user_id;

        $orders = Order::where('user_id', $user_id)->whereBetween('created_at', [$date, Carbon::now()])->get();


        // Compter le nombre de commandes trouvées
        return  $nombreDeTransactions = $orders->count();
    }

    public function conversations()
    {


        // Récupérer l'ID du freelance

        // Définir la date d'il y a 7 jours
        $date = Carbon::now()->subDays(7);

        // Récupérer toutes les conversations qui ont eu lieu au cours des 7 derniers jours
        $conversations = Conversation::whereBetween('created_at', [$date, Carbon::now()])
            ->where('user_id', $this->user_id)->get();

        // Compter le nombre d'utilisateurs uniques avec lesquels le freelance a interagi
        return $nombreUtilisateurs = $conversations->unique()->count();
    }



    function pourcentageChangementMoisPrecedent()
    {
        $user_id = $this->user_id;

        $debutMoisEnCours = Carbon::now()->startOfMonth();
        $finMoisEnCours = Carbon::now()->endOfMonth();
        $debutMoisPrecedent = Carbon::now()->subMonth()->startOfMonth();
        $finMoisPrecedent = Carbon::now()->subMonth()->endOfMonth();


        $totalArgentMoisEnCours = Order::where('user_id', $user_id)
            ->whereBetween('created_at', [$debutMoisEnCours, $finMoisEnCours])
            ->sum('total_amount');

        $totalArgentMoisPrecedent = Order::where('user_id', $user_id)
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
        $user_id = $this->user_id;

        $date = Carbon::now()->subDays(7);

        // Récupérer toutes les commandes créées au cours des 7 derniers jours
        $this->orders = Order::where('user_id', $user_id)->whereBetween('created_at', [$date, Carbon::now()])->get();

        // Compter le nombre de commandes trouvées
        $nombreDeTransactions = $this->orders->count();

        // Récupérer le nombre de commandes créées lors de la semaine précédente
        $nombreDeTransactionsSemainePrecedente = Order::where('user_id', $user_id)
            ->whereBetween('created_at', [$date->subDays(7), $date])->count();

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
        return view('livewire.user.transaction.dashbord-user', [
            'amount' => $this->total(),
            'order' => Order::where('user_id', $this->user_id)->paginate(10),
            'orderCount' => $this->OrderWeek(),
            'conversations' => $this->conversations(),
            'projet' => Project::where('user_id', $this->user_id)->where('status', 'pending')->get(),

            "percentTransaction" => $this->pourcentageChangementMoisPrecedent(),
            'orderEvolution' => $this->calculateTransactionsEvolution(),
        ])->extends('layouts.userProfile')->section('content');
    }
}