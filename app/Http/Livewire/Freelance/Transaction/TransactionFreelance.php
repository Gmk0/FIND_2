<?php

namespace App\Http\Livewire\Freelance\Transaction;

use Livewire\Component;
use App\Models\freelance;
use App\Models\Order;
use App\Models\service;

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

class TransactionFreelance extends Component

implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $is_publish;

    public $freelance_id;


    private function getIdFreelance()
    {
        $id = freelance::where('id', Auth::user()->id)->first();
        return $id;
    }




    protected function getTableQuery(): Builder
    {

        // $freelance = freelance::where('user_id', Auth::user()->id)->first();
        $freelance = auth()->user()->freelance->id;

        $order = Order::query();
        // Créer une requête pour la table "Service"
        $order->whereHas('service', function ($query) use ($freelance) {
            $query->where('freelance_id', $freelance);
        })->where('status', 'completed')
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

    public function totalAmount()
    {
        $transactions = Order::whereHas('service', function ($query) {
            $query->where('freelance_id', auth()->user()->freelance->id);
        })->where('status', 'completed')->sum('total_amount');
        // Calculer le total de tous les montants des transactions trouvées
        $total = '$' . number_format($transactions, 2, ',', ' ');
        return $total;
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('status')
                ->options([
                    'completed' => 'Payer',
                    'pending' => 'en Attente',
                    'rejeted' => 'Rejecter',
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
                ->url(fn (Order $record): string => route('freelance.transaction.view', $record->transaction->transaction_numero))

                ->tooltip('Voir transaction')
                ->icon('heroicon-s-pencil'),






        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [5, 15, 25, 100];
    }

    public function render()
    {
        return view('livewire.freelance.transaction.transaction-freelance', [
            'payer' => $this->totalAmount(),
            'pending' => Order::whereHas('service', function ($query) {
                $query->where('freelance_id', auth()->user()->freelance->id);
            })->where('status', 'pending')->count(),
            'rejeted' => Order::whereHas('service', function ($query) {
                $query->where('freelance_id', auth()->user()->freelance->id);
            })->where('status', 'rejeted')->count(),
        ])->extends('layouts.freelanceTest2')->section('content');
    }
}