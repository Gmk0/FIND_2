<?php

namespace App\Http\Livewire\Freelance\Mission;

use Livewire\Component;
use App\Models\freelance;
use App\Models\Project;
use App\Models\ProjectResponse;
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

class Proposition extends Component implements Tables\Contracts\HasTable
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
        $freelance = auth()->user()->getIdFreelance();

        $ProjectResponse = ProjectResponse::query();

        $ProjectResponse->where('freelance_id', $freelance)->where('status', 'accepter')->get();

        // Créer une requête pour la table "Project"


        // Retourner la requête


        return $ProjectResponse;
    }


    protected function getTableColumns(): array
    {
        return [

            Split::make([
                //Tables\Columns\TextColumn::make('id')->description(' id'),
                Tables\Columns\TextColumn::make('project.user.name')->description('client'),
                Tables\Columns\TextColumn::make('project.title')->description('service'),
                Tables\Columns\TextColumn::make('bid_amount')->description('budget'),
                BadgeColumn::make('project.status')
                    ->enum([
                        'completed' => 'Finis',
                        'active' => 'en cours',
                        'inactive' => 'inactive',
                    ])->colors([

                        'warning' => static fn ($state): bool => $state === 'active',
                        'success' => static fn ($state): bool => $state === 'completed',
                        'danger' => static fn ($state): bool => $state === 'inactive',
                    ]),
                BadgeColumn::make('is_paid')
                    ->enum([
                        'payer' => 'payer',
                        'rejecter' => 'en attente',
                        'rejecter' => 'rejecter',
                    ])->colors([

                        'warning' => static fn ($state): bool => $state === 'en attente',
                        'success' => static fn ($state): bool => $state === 'payer',
                        'danger' => static fn ($state): bool => $state === 'rejecter',
                    ])->description('Paiment'),
            ]),
            Panel::make([
                Stack::make([

                    Tables\Columns\TextColumn::make('project.end_project'),
                    Tables\Columns\TextColumn::make('project.description'),

                ]),
            ])->collapsible(),





        ];
    }

    protected function getTableActions(): array
    {
        return [
            // ...
            Action::make('Voir')
                ->url(fn (ProjectResponse $record): string => route('freelance.proposition.accepted', $record->id))
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
        return view('livewire.freelance.mission.proposition')->layout('layouts.freelance-profile');
    }
}
