<?php

namespace App\Filament\Clusters\Devices\Resources\OverviewResource\Pages;

use App\Filament\Clusters\Devices\Resources\OverviewResource;
use App\Filament\Extend\ViewRecordExtension;
use Filament\Actions;

class ViewOverview extends ViewRecordExtension
{
    protected static string $resource = OverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
