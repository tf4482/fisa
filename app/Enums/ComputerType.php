<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ComputerType: string implements HasLabel
{
    case Minipc = 'Mini PC';
    case Desktop = 'Desktop';
    case Laptop = 'Laptop';
    case Tablet = 'Tablet';
    case VirtualMachine = 'Virtual Machine';
    case Other = 'Other';

    public function getLabel(): string
    {
        return match ($this) {
            DeviceType::Minipc => __('Mini PC'),
            DeviceType::Desktop => __('Desktop'),
            DeviceType::Laptop => __('Laptop'),
            DeviceType::Tablet => __('Tablet'),
            DeviceType::VirtualMachine => __('Virtual Machine'),
            DeviceType::Other => __('Other'),
        };
    }
}
