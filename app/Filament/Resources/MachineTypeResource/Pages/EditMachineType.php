<?php

namespace App\Filament\Resources\MachineTypeResource\Pages;

use App\Filament\Resources\MachineTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMachineType extends EditRecord
{
    protected static string $resource = MachineTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
