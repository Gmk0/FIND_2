<?php

namespace App\Http\Livewire\Freelance\Transaction;

use Livewire\Component;
use App\Models\freelance;
use App\Models\Order;
use App\Models\service;
use App\Models\Transaction;
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


    public function mount()
    {
    }



    protected function getTableQuery(): Builder
    {

        // $freelance = freelance::where('user_id', Auth::user()->id)->first();
        $freelance = auth()->user()->freelance->id;

        $transaction = Transaction::query();
        // Créer une requête pour la table "Service"
        $transaction = Transaction::query();
        // Créer une requête pour la table "Service"
        $transaction->whereHas('orders.service', function ($query) use ($freelance) {
            $query->where('freelance_id', $freelance);
        })->OrwhereHas('project.projectResponses', function ($query) use ($freelance) {
            $query->where('freelance_id', $freelance)
                ->where('is_paid', 'payer');
        })
            ->get();

        // Ajouter une condition pour l'utilisateur connecté

        // Retourner la requête
        return $transaction;
    }

    protected function getTableColumns(): array
    {
        return [

            Split::make([

                Tables\Columns\TextColumn::make('transaction_numero')->description('Transaction'),
                Tables\Columns\TextColumn::make('payment_token')->description('payment_token')->visibleFrom('lg'),
                Tables\Columns\TextColumn::make('amount')->description('Montant'),
                BadgeColumn::make('status')
                    ->enum([
                        'successfull' => 'Payer',
                        'pending' => 'en Attente',
                        'failed' => 'failed',
                    ])->colors([

                        'warning' => static fn ($state): bool => $state === 'pending',
                        'success' => static fn ($state): bool => $state === 'successfull',
                        'danger' => static fn ($state): bool => $state === 'failed',
                    ]),
            ]),
            Panel::make([
                Stack::make([
                    Tables\Columns\TextColumn::make('payment_token')->description('payment_token')->visibleFrom('md'),
                    Tables\Columns\TextColumn::make('user.name')->description('client'),
                    Tables\Columns\TextColumn::make('created_at')->description('date'),

                ]),
            ])->collapsible(),





        ];
    }

    public function totalAmount()
    {
        $freelance = auth()->user()->freelance->id;
        $transactions = Transaction::whereHas('orders.service', function ($query) use ($freelance) {
            $query->where('freelance_id', $freelance);
        })->OrwhereHas('project.projectResponses', function ($query) use ($freelance) {
            $query->where('freelance_id', $freelance)
                ->where('is_paid', 'payer');
        })
            ->sum('amount');
        // Calculer le total de tous les montants des transactions trouvées
        $total = '$' . number_format($transactions, 2, ',', ' ');
        return $total;
    }

    protected function getTableFilters(): array
    {
        return [
            SelectFilter::make('status')
                ->options([
                    'successfull' => 'Payer',
                    'pending' => 'en Attente',
                    'failed' => 'Rejecter',
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
                ->url(fn (transaction $record): string => route('freelance.transaction.view', $record->transaction_numero))


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
        ])->layout('layouts.freelance-profile');
    }
}
