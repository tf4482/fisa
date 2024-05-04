<?php

namespace App\Filament;

use Filament\Resources\Pages\ListRecords;

/**
 * This abstract class extends the ListRecords class and provides additional functionality for handling records.
 */
abstract class ListRecordsExtension extends ListRecords
{
    /**
     * Get the redirect URL after a successful operation.
     *
     * @return string The redirect URL.
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
