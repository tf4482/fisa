<?php

namespace App\Filament\Resources\HostResource\Pages;

use App\Filament\Resources\BaseEditRecord;
use App\Filament\Resources\HostResource;
use App\Filament\Resources\NetworkConfigurationResource;

class EditHost extends BaseEditRecord
{
    protected static string $resource = HostResource::class;

    protected function getHeaderActions(): array
    {
        parent::getHeaderActions();

        return $this->ensureReferentialIntegrity(HostResource::class, NetworkConfigurationResource::class);
    }
}
