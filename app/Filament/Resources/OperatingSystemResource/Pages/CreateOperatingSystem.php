<?php

namespace App\Filament\Resources\OperatingSystemResource\Pages;

use App\Filament\Resources\OperatingSystemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOperatingSystem extends CreateRecord
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected static string $resource = OperatingSystemResource::class;
}
