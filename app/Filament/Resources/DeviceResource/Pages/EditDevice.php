<?php

namespace App\Filament\Resources\DeviceResource\Pages;

use App\Filament\Resources\DeviceResource;
use App\Filament\Resources\HostResource;
use App\Traits\EnsureReferentialIntegrity;
use Filament\Resources\Pages\EditRecord;

class EditDevice extends EditRecord
{
    use EnsureReferentialIntegrity;

    protected static string $resource = DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return $this->ensureReferentialIntegrity(DeviceResource::class, HostResource::class);
    }
}
