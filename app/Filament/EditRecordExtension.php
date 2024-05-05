<?php

namespace App\Filament;

use App\Traits\Filament\ActionElements;
use Filament\Resources\Pages\EditRecord;

/**
 * This abstract class extends the EditRecord class and provides additional functionality for editing records.
 */
abstract class EditRecordExtension extends EditRecord
{
    use ActionElements;

    /**
     * Get the redirect URL after saving the record.
     *
     * @return string The redirect URL.
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
