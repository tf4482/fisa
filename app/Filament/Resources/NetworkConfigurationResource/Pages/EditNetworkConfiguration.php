<?php

namespace App\Filament\Resources\NetworkConfigurationResource\Pages;

use App\Filament\Resources\NetworkConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNetworkConfiguration extends EditRecord
{
    protected static string $resource = NetworkConfigurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
