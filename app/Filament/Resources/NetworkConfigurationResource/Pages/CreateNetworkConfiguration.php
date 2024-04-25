<?php

namespace App\Filament\Resources\NetworkConfigurationResource\Pages;

use App\Filament\Resources\NetworkConfigurationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNetworkConfiguration extends CreateRecord
{
    protected static string $resource = NetworkConfigurationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
