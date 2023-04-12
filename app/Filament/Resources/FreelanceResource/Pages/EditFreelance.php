<?php

namespace App\Filament\Resources\FreelanceResource\Pages;

use App\Filament\Resources\FreelanceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFreelance extends EditRecord
{
    protected static string $resource = FreelanceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
