<?php

namespace App\Filament\Resources;

use Filament\Resources\Pages\CreateRecord;

abstract class BaseCreateRecord extends CreateRecord
{
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
