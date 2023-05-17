<?php

namespace App\Http\Livewire\User\Commande;

use Livewire\Component;
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

class CommandeUser extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $status = null;
    public $modal = false;




    protected function getTableQuery(): Builder
    {

        // $freelance = freelance::where('user_id', Auth::user()->id)->first();
        $user = auth()->user()->id;

        $order = Order::query();
        // Créer une requête pour la table "Service"
        $order->where('user_id', $user)->OrderBy('created_at', 'Desc')->get();

        // Ajouter une condition pour l'utilisateur connecté

        // Retourner la requête
        return $order;
    }

    protected function getTableColumns(): array
    {
        return [


            Split::make([
                Tables\Columns\TextColumn::make('order_numero')->label('order')->description('commande id'),
                Tables\Columns\TextColumn::make('service.freelance.user.name')->description('freelance')->visibleFrom('md'),
                Tables\Columns\TextColumn::make('service.title')->description('service')->visibleFrom('md'),
                Tables\Columns\TextColumn::make('progress')->description('progression'),
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

                stack::make([
                    Tables\Columns\TextColumn::make('total_amount')->description('montant'),
                    Tables\Columns\TextColumn::make('service.title')->description('service'),
                    Tables\Columns\TextColumn::make('service.freelance.user.name')->description('freelance'),

                    Tables\Columns\TextColumn::make('created_at'),


                ]),





            ])->collapsible()->visible('sm')


        ];
    }

    protected function getTableActions(): array
    {
        return [
            // ...
            Action::make('Voir')
                ->url(fn (Order $record): string => route('commandeOneView', $record->id))
                // ->openUrlInNewTab()
                ->icon('heroicon-s-pencil')
                ->tooltip('Voir les services'),
            Action::make('Facture')
                // Vérifie si la transaction est non nulle
                ->url(fn (Order $record): string => isset($record->transaction) ? route('facturation', $record->transaction->transaction_numero) : url('/services'))
                ->openUrlInNewTab()
                ->icon('heroicon-s-printer')
                ->tooltip('Voir les services'),





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
            Filter::make('created_at')
                ->form([
                    Forms\Components\DatePicker::make('created_from'),
                    Forms\Components\DatePicker::make('created_until'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                        );
                })
        ];
    }
    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [5, 15, 25, 100];
    }


    public function render()
    {
        return view('livewire.user.commande.commande-user', [
            'Orders' => Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')
                ->when($this->status, function ($q) {
                    $q->where('status', $this->status);
                })
                ->get(),
        ])->extends('layouts.userProfile')->section('content');
    }
}
