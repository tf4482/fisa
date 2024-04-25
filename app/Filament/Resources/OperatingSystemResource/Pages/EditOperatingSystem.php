<?php

namespace App\Filament\Resources\OperatingSystemResource\Pages;

use App\Filament\Resources\OperatingSystemResource;
use App\Filament\Resources\HostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Traits\EnsureReferentialIntegrity;

class EditOperatingSystem extends EditRecord
{
    use EnsureReferentialIntegrity;

    protected static string $resource = OperatingSystemResource::class;

    protected function getHeaderActions(): array
    {
        return $this->ensureReferentialIntegrity(OperatingSystemResource::class, HostResource::class);
    }
}
