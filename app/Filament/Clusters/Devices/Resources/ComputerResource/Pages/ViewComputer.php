<?php

namespace App\Filament\Clusters\Devices\Resources\ComputerResource\Pages;

use App\Filament\Clusters\Devices\Resources\ComputerResource;
use App\Filament\Extend\ViewRecordExtension;
use Filament\Actions;

class ViewComputer extends ViewRecordExtension
{
    protected static string $resource = ComputerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
