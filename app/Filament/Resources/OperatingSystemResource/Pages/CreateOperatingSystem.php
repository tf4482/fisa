<?php

namespace App\Filament\Resources\OperatingSystemResource\Pages;

use App\Filament\Resources\OperatingSystemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOperatingSystem extends CreateRecord
{
    protected static string $resource = OperatingSystemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
