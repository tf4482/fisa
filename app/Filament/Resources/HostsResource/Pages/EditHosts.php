<?php

namespace App\Filament\Resources\HostsResource\Pages;

use App\Filament\Resources\HostsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHosts extends EditRecord
{
    protected static string $resource = HostsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
