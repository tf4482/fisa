<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Overview extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.overview';

    public function getTitle(): string
    {
        return __('Overview');
    }

    public static function getNavigationLabel(): string
    {
        return __('Overview');
    }
}
