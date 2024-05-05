<?php

namespace App\Filament\Pages;

use App\Models\Hosts;
use Filament\Pages\Page;

class Overview extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.overview';

    public $hosts;

    public function getTitle(): string
    {
        return __('Overview');
    }

    public static function getNavigationLabel(): string
    {
        return __('Overview');
    }

    public function mount(): void
    {
        $this->hosts = Hosts::orderBy('name')->get();
    }
}
