<?php

namespace App\Filament\Resources;

use App\Models\DeviceStatus;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Table;

class DeviceStatusResource extends Resource
{
    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $model = DeviceStatus::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-group';

    public static function getModelLabel(): string
    {
        return __('Device status');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Devices statuses');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make([
                BelongsToSelect::make('host_id')
                    ->relationship('host', 'hostname')
                    ->label('Host')
                    ->required()
                    ->unique()
                    ->placeholder(__('Select the host')),
            ]),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('host.hostname')
                ->label(__('Host'))
                ->searchable(true),

            BadgeColumn::make('host.status')
                ->label('Status')
                ->colors([
                    'success' => 'online',
                    'danger' => 'offline',
                ]),
        ])
            ->defaultSort('id', 'asc')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([

                Tables\Actions\EditAction::make()
                    ->label('Edit Device Status')
                    ->icon('heroicon-o-pencil'),

            ])
            ->recordAction(Tables\Actions\ViewAction::class)
            ->recordUrl(null);

    }

    protected function getTablePollingInterval(): ?string
    {
        return '10s';
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => DeviceStatusResource\Pages\ListDeviceStatuses::route('/'),
            'create' => DeviceStatusResource\Pages\CreateDeviceStatus::route('/create'),
            'edit' => DeviceStatusResource\Pages\EditDeviceStatus::route('/{record}/edit'),
        ];
    }
}
