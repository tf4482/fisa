<?php

namespace App\Filament\Resources\OperatingSystemResource\Pages;

use App\Filament\Resources\OperatingSystemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOperatingSystems extends ListRecords
{
    protected static string $resource = OperatingSystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
