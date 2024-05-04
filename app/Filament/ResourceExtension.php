<?php

namespace App\Filament;

use App\Traits\Filament\FormElements;
use App\Traits\Filament\TableElements;
use Filament\Resources\Resource;

/**
 * This abstract class represents a resource extension for a Filament resource.
 * It extends the base Resource class and includes the FormElements and TableElements traits.
 */
abstract class ResourceExtension extends Resource
{
    use FormElements;
    use TableElements;
}
