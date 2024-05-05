<?php

namespace App\Filament\Resources\HostsResource\Pages;

use App\Filament\EditRecordExtension;
use App\Filament\Resources\HostsResource;
use Filament\Actions;

class EditHosts extends EditRecordExtension
{
    protected static string $resource = HostsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
