<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HostResource\Pages;
use App\Models\Host;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HostResource extends Resource
{
    protected static ?string $model = Host::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-group';

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
        return __('Configuration');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('hostname')
                    ->label('Hostname')
                    ->required()
                    ->placeholder(__('Enter the hostname of the host')),

                Forms\Components\TextInput::make('username')
                    ->label('Username')
                    ->placeholder(__('Enter the username of the host')),

                Forms\Components\BelongsToSelect::make('device_id')
                    ->label('Device')
                    ->required()
                    ->relationship('device', 'model')
                    ->placeholder(__('Select the device of the host')),

                Forms\Components\BelongsToSelect::make('operating_system_id')
                    ->label('Operating System')
                    ->required()
                    ->relationship('operatingSystem', 'system')
                    ->placeholder(__('Select the operating system of the host')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hostname')
                    ->label('Hostname')
                    ->sortable()
                    ->searchable(isGlobal: true),

                Tables\Columns\TextColumn::make('username')
                    ->label('Username')
                    ->sortable()
                    ->searchable(isGlobal: true),

                Tables\Columns\TextColumn::make('device.model')
                    ->label('Device')
                    ->sortable()
                    ->searchable(isGlobal: true),

                Tables\Columns\TextColumn::make('operatingSystem.system')
                    ->label('Operating System')
                    ->sortable()
                    ->searchable(isGlobal: true),
            ])
            ->filters([
                //
            ])
            ->actions([

            ])
            ->bulkActions([

            ])
            ->defaultSort('hostname', 'asc')
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
            'index' => Pages\ListHosts::route('/'),
            'create' => Pages\CreateHost::route('/create'),
            'edit' => Pages\EditHost::route('/{record}/edit'),
        ];
    }
}
