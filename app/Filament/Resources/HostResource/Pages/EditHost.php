<?php

namespace App\Filament\Resources\HostResource\Pages;

use App\Filament\Resources\HostResource;
use App\Filament\Resources\NetworkConfigurationResource;
use App\Traits\EnsureReferentialIntegrity;
use Filament\Resources\Pages\EditRecord;

class EditHost extends EditRecord
{
    use EnsureReferentialIntegrity;

    protected static string $resource = HostResource::class;

    protected function getHeaderActions(): array
    {
        return $this->ensureReferentialIntegrity(HostResource::class, NetworkConfigurationResource::class);
    }
}
