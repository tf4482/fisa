<?php

namespace App\Filament\Resources;

use App\Filament\ResourceExtension;
use App\Filament\Resources\HostsResource\Pages;
use App\Models\Hosts;
use Filament\Forms\Form;
use Filament\Tables\Table;

class HostsResource extends ResourceExtension
{
    protected static ?string $model = Hosts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('Host');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Hosts');
    }

    public static function getNavigationGroup(): string
    {
        return __('Main');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                self::textInputGeneric('name', 'Hostname', true),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                self::textColumnGeneric('name', 'Hostname'),
                self::textColumnGeneric('status', 'Status'),
            ])
            ->persistSortInSession()
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ])
            ->defaultSort('name', 'asc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHosts::route('/'),
            'create' => Pages\CreateHosts::route('/create'),
            'edit' => Pages\EditHosts::route('/{record}/edit'),
        ];
    }
}
