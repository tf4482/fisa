<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum DeviceType: string implements HasLabel
{
    case Minipc = 'Minipc';
    case Desktop = 'Desktop';
    case Laptop = 'Laptop';
    case Tablet = 'Tablet';
    case Smartphone = 'Smartphone';
    case Smartwatch = 'Smartwatch';
    case Other = 'Other';

    public function getLabel(): string
    {
        return match ($this) {
            DeviceType::Minipc => __('Mini PC'),
            DeviceType::Desktop => __('Desktop'),
            DeviceType::Laptop => __('Laptop'),
            DeviceType::Tablet => __('Tablet'),
            DeviceType::Smartphone => __('Smartphone'),
            DeviceType::Smartwatch => __('Smartwatch'),
            DeviceType::Other => __('Other'),
        };
    }
}
