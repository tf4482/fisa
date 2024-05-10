<?php

namespace App\Filament\Extend;

use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\MaxWidth;

/**
 * This abstract class extends the ViewRecord class and provides additional functionality for viewing records.
 */
abstract class ViewRecordExtension extends ViewRecord
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

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
