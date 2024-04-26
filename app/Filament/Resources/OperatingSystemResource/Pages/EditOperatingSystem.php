<?php

namespace App\Filament\Resources\OperatingSystemResource\Pages;

use App\Filament\Resources\BaseEditRecord;
use App\Filament\Resources\HostResource;
use App\Filament\Resources\OperatingSystemResource;

class EditOperatingSystem extends BaseEditRecord
{
    protected static string $resource = OperatingSystemResource::class;

    protected function getHeaderActions(): array
    {
        parent::getHeaderActions();

        return $this->ensureReferentialIntegrity(OperatingSystemResource::class, HostResource::class);
    }
}
