<?php

namespace App\Filament\Resources\OperatingSystemResource\Pages;

use App\Filament\Resources\OperatingSystemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOperatingSystem extends EditRecord
{
    protected static string $resource = OperatingSystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
