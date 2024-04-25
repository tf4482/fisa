<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NetworkConfigurationResource\Pages;
use App\Models\NetworkConfiguration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NetworkConfigurationResource extends Resource
{
    protected static ?string $model = NetworkConfiguration::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-group';

    public static function getModelLabel(): string
    {
        return __('Network Configuration');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Network Configurations');
    }

    public static function getNavigationGroup(): string
    {
        return __('Configuration');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ip_address')
                    ->label(__('IP address'))
                    ->required()
                    ->placeholder(__('Enter the IP address which will be assigned to a host'))
                    ->rule('ipv4'),
                Forms\Components\TextInput::make('sshport')
                    ->label(__('SSH port'))
                    ->placeholder(__('Enter the SSH port which will be used to connect to the host'))
                    ->rule(['numeric']),
                Forms\Components\BelongsToSelect::make('host_id')
                    ->label(__('Host'))
                    ->relationship('host', 'hostname')
                    ->required()
                    ->placeholder(__('Select the host to which the ip address will be assigned')),
                Forms\Components\Checkbox::make('pingcheck')
                    ->label(__('Ping check'))
                    ->default(false)
                    ->inline(false),
            ])
            ->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('ip_address')
                    ->label(__('IP Aaddress'))
                    ->searchable()
                    ->searchable(isGlobal: true),
                Tables\Columns\TextColumn::make('sshport')
                    ->label(__('SSH port'))
                    ->searchable()
                    ->searchable(isGlobal: true),
                Tables\Columns\TextColumn::make('host.hostname')
                    ->label(__('Host'))
                    ->searchable()
                    ->searchable(isGlobal: true),
                Tables\Columns\checkboxColumn::make('pingcheck')
                    ->label(__('Ping check'))
                    ->searchable()
                    ->searchable(isGlobal: true),
            ])
            ->defaultSort('ip_address', 'asc')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListNetworkConfigurations::route('/'),
            'create' => Pages\CreateNetworkConfiguration::route('/create'),
            'edit' => Pages\EditNetworkConfiguration::route('/{record}/edit'),
        ];
    }
}
