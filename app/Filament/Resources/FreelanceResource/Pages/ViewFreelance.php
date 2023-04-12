<?php

namespace App\Filament\Resources\FreelanceResource\Pages;

use App\Filament\Resources\FreelanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFreelance extends ViewRecord
{
    protected static string $resource = FreelanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
