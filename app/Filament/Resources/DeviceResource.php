<?php

namespace App\Filament\Resources;

use App\Enums\DeviceType;
use App\Filament\Resources\DeviceResource\Pages;
use App\Models\Device;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-group';

    public static function getModelLabel(): string
    {
        return __('Device');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Devices');
    }

    public static function getNavigationGroup(): string
    {
        return __('Configuration');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('model')
                    ->label(__('Model'))
                    ->required(),
                Forms\Components\Select::make('device_type')
                    ->label(__('Device type'))
                    ->options(DeviceType::class)
                    ->default(DeviceType::Other),
                Forms\Components\TextInput::make('mac_address'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('model')
                    ->label('Model')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('device_type')
                    ->label('Device type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mac_address')
                    ->label('MAC address')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
