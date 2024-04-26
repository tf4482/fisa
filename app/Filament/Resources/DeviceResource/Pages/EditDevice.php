<?php

namespace App\Filament\Resources\DeviceResource\Pages;

use App\Filament\Resources\BaseEditRecord;
use App\Filament\Resources\DeviceResource;
use App\Filament\Resources\HostResource;

class EditDevice extends BaseEditRecord
{
    protected static string $resource = DeviceResource::class;

    protected function getHeaderActions(): array
    {
        parent::getHeaderActions();

        return $this->ensureReferentialIntegrity(DeviceResource::class, HostResource::class);
    }
}
