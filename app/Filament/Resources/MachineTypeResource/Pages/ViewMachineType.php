<?php

namespace App\Filament\Resources\MachineTypeResource\Pages;

use App\Filament\Resources\MachineTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMachineType extends ViewRecord
{
    protected static string $resource = MachineTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
