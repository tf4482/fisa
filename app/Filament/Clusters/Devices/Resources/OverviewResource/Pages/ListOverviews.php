<?php

namespace App\Filament\Clusters\Devices\Resources\OverviewResource\Pages;

use App\Filament\Clusters\Devices\Resources\OverviewResource;
use App\Filament\Extend\ListRecordsExtension;
use Filament\Actions;

class ListOverviews extends ListRecordsExtension
{
    protected static string $resource = OverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
