<?php

namespace App\Filament\Resources\HostsResource\Pages;

use App\Filament\ListRecordsExtension;
use App\Filament\Resources\HostsResource;
use Filament\Actions;

class ListHosts extends ListRecordsExtension
{
    protected static string $resource = HostsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
