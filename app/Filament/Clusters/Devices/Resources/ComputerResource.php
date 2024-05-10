<?php

namespace App\Filament\Clusters\Devices\Resources;

use App\Filament\Clusters\Devices;
use App\Filament\Clusters\Devices\Resources\ComputerResource\Pages;
use App\Filament\Extend\ResourceExtension;
use App\Models\Computer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Table;

class ComputerResource extends ResourceExtension
{
    protected static ?string $model = Computer::class;

    protected static ?string $cluster = Devices::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getModelLabel(): string
    {
        return __('Computer');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Computers');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                self::textInputGeneric('name', 'Hostname', true),
                self::textInputGeneric('ip', 'IP adress', true),
                self::textInputGeneric('mac', 'MAC adress'),
                Forms\Components\Select::make('type')
                    ->label(__('Device type'))
                    ->options(DeviceType::class)
                    ->default(DeviceType::Other),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                self::textColumnGeneric('name', 'Hostname'),
                self::textColumnGeneric('status', 'Status'),
                self::textColumnGeneric('ip', 'IP adress'),
                self::textColumnGeneric('mac', 'MAC adress'),
                self::textColumnGeneric('type', 'Device type'),
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
            'index' => Pages\ListComputers::route('/'),
            'create' => Pages\CreateComputer::route('/create'),
            'view' => Pages\ViewComputer::route('/{record}'),
            'edit' => Pages\EditComputer::route('/{record}/edit'),
        ];
    }
}
