<?php

namespace App\Filament\Resources;

use App\Filament\ResourceExtension;
use App\Filament\Resources\HostsResource\Pages;
use App\Models\Hosts;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;

class HostsResource extends ResourceExtension
{
    protected static ?string $model = Hosts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
