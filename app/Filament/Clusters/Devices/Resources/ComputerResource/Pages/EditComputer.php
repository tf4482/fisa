<?php

namespace App\Filament\Clusters\Devices\Resources\ComputerResource\Pages;

use App\Filament\Clusters\Devices\Resources\ComputerResource;
use App\Filament\Extend\EditRecordExtension;
use Filament\Actions;

class EditComputer extends EditRecordExtension
{
    protected static string $resource = ComputerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
