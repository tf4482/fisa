<?php

namespace App\Filament\Clusters\Devices\Resources\ComputerResource\Pages;

use App\Filament\Clusters\Devices\Resources\ComputerResource;
use App\Filament\Extend\ListRecordsExtension;
use Filament\Actions;

class ListComputers extends ListRecordsExtension
{
    protected static string $resource = ComputerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
