<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ComputerType: string implements HasLabel
{
    case minipc = 'minipc';
    case desktop = 'desktop';
    case laptop = 'laptop';
    case tablet = 'tablet';
    case virtualmachine = 'virtualmachine';
    case clouddevice = 'clouddevice';
    case other = 'other';

    public function getLabel(): string
    {
        return match ($this) {
            self::minipc => __('Mini PC'),
            self::desktop => __('Desktop'),
            self::laptop => __('Laptop'),
            self::tablet => __('Tablet'),
            self::virtualmachine => __('Virtual Machine'),
            self::clouddevice => __('Cloud Device'),
            self::other => __('Other'),
        };
    }
}
