<?php

namespace App\Filament\Pages;

use App\Models\Hosts;
use Filament\Pages\Page;

class NetworkDevices extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.network-devices';

    public $hosts;

    public function getTitle(): string
    {
        return __('Network devices');
    }

    public static function getNavigationLabel(): string
    {
        return __('Network devices');
    }

    public function mount(): void
    {
        $this->hosts = Hosts::orderBy('name')->get();
    }
}
