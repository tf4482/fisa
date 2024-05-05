<?php

namespace App\Filament;

use Filament\Resources\Pages\CreateRecord;

/**
 * This abstract class extends the CreateRecord class and provides additional functionality for creating records.
 */
abstract class CreateRecordExtension extends CreateRecord
{
    /**
     * Get the redirect URL after creating a record.
     *
     * @return string The redirect URL.
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
