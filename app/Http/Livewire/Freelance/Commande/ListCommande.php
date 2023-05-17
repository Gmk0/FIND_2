<?php

namespace App\Http\Livewire\Freelance\Commande;

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

class ListCommande extends Component implements Tables\Contracts\HasTable
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
        })->orderBy('created_at', 'Desc')->get();

        // Ajouter une condition pour l'utilisateur connecté

        // Retourner la requête
        return $order;
    }

    protected function getTableColumns(): array
    {
        return [

            Split::make([
                Tables\Columns\TextColumn::make('order_numero')->label('order')->description('commande id'),
                Tables\Columns\TextColumn::make('user.name')->description('client'),
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
                Stack::make([

                    Tables\Columns\TextColumn::make('total_amount'),
                    Tables\Columns\TextColumn::make('created_at'),
                    Tables\Columns\TextColumn::make('service.title')->visible('sm'),

                ]),
            ])->collapsible(),





        ];
    }

    protected function getTableActions(): array
    {
        return [
            // ...
            Action::make('Voir')
                ->url(fn (Order $record): string => route('freelance.Order.view', $record->id))
                // ->openUrlInNewTab()
                ->icon('heroicon-s-pencil')
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
        return view('livewire.freelance.commande.list-commande', [
            'payer' => Order::whereHas('service', function ($query) {
                $query->where('freelance_id', auth()->user()->freelance->id);
            })->where('status', 'completed')->count(),
            'pending' => Order::whereHas('service', function ($query) {
                $query->where('freelance_id', auth()->user()->freelance->id);
            })->where('status', 'pending')->count(),
            'rejeted' => Order::whereHas('service', function ($query) {
                $query->where('freelance_id', auth()->user()->freelance->id);
            })->where('status', 'rejeted')->count(),
        ])->extends('layouts.freelanceTest2')->section('content');
    }
}
