<?php

namespace App\Http\Livewire\User\Transaction;

use Livewire\Component;
use App\Models\Transaction;
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

class TransactionUser extends Component implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;
    public $transaction;


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
                ->url(fn (Order $record): string => route('transactionOneUser', $record->transaction->transaction_numero))
                ->openUrlInNewTab()
                ->tooltip('Voir transaction')
                ->icon('heroicon-s-pencil'),
            Action::make('Facture')
                // Vérifie si la transaction est non nulle
                ->url(fn (Order $record): string => isset($record->transaction) ? route('facturation', $record->transaction->transaction_numero) : url('/services'))
                ->openUrlInNewTab()
                ->icon('heroicon-s-printer')
                ->tooltip('Voir les services'),






        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [5, 15, 25, 100];
    }


    public function render()
    {
        return view(
            'livewire.user.transaction.transaction-user'
        )->extends('layouts.userProfile')->section('content');
    }
}