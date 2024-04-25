<?php

namespace App\Filament\Resources\NetworkConfigurationResource\Pages;

use App\Filament\Resources\NetworkConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNetworkConfigurations extends ListRecords
{
    protected static string $resource = NetworkConfigurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
