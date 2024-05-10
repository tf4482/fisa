<?php

namespace App\Filament\Extend;

use App\Traits\Filament\ActionElements;
use App\Traits\Filament\FormElements;
use App\Traits\Filament\TableElements;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;

/**
 * This abstract class represents a resource extension for a Filament resource.
 * It extends the base Resource class and includes the FormElements and TableElements traits.
 */
abstract class ResourceExtension extends Resource
{
    use ActionElements;
    use FormElements;
    use TableElements;

    protected static bool $hasTitleCaseModelLabel = false;

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::Full;
    }
}
