<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ComputerType: string implements HasLabel
{
    case MiniPC = 'Mini PC';
    case Desktop = 'Desktop';
    case Laptop = 'Laptop';
    case Tablet = 'Tablet';
    case Virtualmachine = 'Virtual machine';
    case Clouddevice = 'Cloud device';
    case Other = 'Other';

    public function getLabel(): string
    {
        return match ($this) {
            ComputerType::MiniPC => __('Mini PC'),
            ComputerType::Desktop => __('Desktop'),
            ComputerType::Laptop => __('Laptop'),
            ComputerType::Tablet => __('Tablet'),
            ComputerType::Virtualmachine => __('Virtual machine'),
            ComputerType::Clouddevice => __('Cloud device'),
            ComputerType::Other => __('Other'),
        };
    }
}
