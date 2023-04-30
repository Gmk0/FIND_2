<?php

namespace App\Http\Livewire\Freelance\Services;

use Livewire\Component;
use App\Models\Freelance;
use App\Models\Service as ModelService;

use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\{ToggleColumn, TextColumn};

use Filament\Tables\Columns\Layout\Stack;

use Filament\Tables\Actions\{BulkAction, Action};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ServiceList extends Component implements Tables\Contracts\HasTable

{
    use Tables\Concerns\InteractsWithTable;

    public $is_publish;


    private function getIdFreelance()
    {
        $id = freelance::where('id', Auth::user()->id)->first();
        return $id;
    }




    protected function getTableQuery(): Builder
    {

        $freelance = freelance::where('user_id', Auth::user()->id)->first();

        // Créer une requête pour la table "Service"
        $service = ModelService::query();

        // Ajouter une condition pour l'utilisateur connecté
        $service->where('freelance_id', $freelance->id);

        // Retourner la requête
        return $service;
    }

    protected function getTableColumns(): array
    {
        return [

            Split::make([
                Tables\Columns\TextColumn::make('title')->description('titre'),
                //Tables\Columns\TextColumn::make('basic_price'),
                Tables\Columns\ToggleColumn::make('is_publish'),
            ]),
            Panel::make([
                Stack::make([
                    TextColumn::make('basic_delivery_time')->description('delivery_time'),
                    TextColumn::make('basic_price')->description('prix'),
                    TextColumn::make('category.name')->description('category'),
                ]),
            ])->collapsible(),





        ];
    }

    protected function getTableBulkActions(): array
    {
        return [
            // ...


            BulkAction::make('delete')
                ->action(fn (Collection $records) => $records->each->delete())
                ->deselectRecordsAfterCompletion()
                ->color('danger')
        ];
    }

    protected function getTableActions(): array
    {
        return [
            // ...
            Action::make('Modifier')
                ->url(fn (ModelService $record): string => route('freelance.service.edit', $record->id))
                // ->openUrlInNewTab()
                ->icon('heroicon-s-pencil'),
            Tables\Actions\DeleteAction::make(),

            Action::make('Feedback')
                ->url(fn (ModelService $record): string => route('freelance.service.feedback', $record->id))
                // ->openUrlInNewTab()
                ->icon('heroicon-s-pencil'),
            Tables\Actions\DeleteAction::make(),



        ];
    }
    public function isTableSearchable(): bool
    {
        return true;
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [10, 25, 50, 100];
    }
    public function render()
    {
        return view('livewire.freelance.services.service-list')->extends('layouts.freelanceTest2')->section('content');
    }
}