<?php

namespace App\Filament\Resources\HostsResource\Pages;

use App\Filament\Resources\HostsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHosts extends ListRecords
{
    protected static string $resource = HostsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
