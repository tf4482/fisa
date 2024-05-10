<?php

namespace App\Filament\Clusters\Devices\Resources\OverviewResource\Pages;

use App\Filament\Clusters\Devices\Resources\OverviewResource;
use App\Filament\Extend\EditRecordExtension;
use Filament\Actions;

class EditOverview extends EditRecordExtension
{
    protected static string $resource = OverviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
