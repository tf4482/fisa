<?php

namespace App\Filament\Clusters\Devices\Resources;

use App\Enums\ComputerType;
use App\Filament\Clusters\Devices;
use App\Filament\Clusters\Devices\Resources\ComputerResource\Pages;
use App\Filament\Extend\ResourceExtension;
use App\Models\Computer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Pages\PageRegistration;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
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
        return $form->schema([
            Forms\Components\Section::make()
                ->schema([
                    self::textInputGeneric('name', 'Name', true),
                    self::textInputGeneric('ip', 'IP address', true)
                        ->rules('ipv4'),
                    self::textInputGeneric('mac', 'MAC address')
                        ->rules('nullable', 'unique:network_devices,mac')
                        ->rules('mac_address'),
                    Forms\Components\Select::make('type')
                        ->label(__('Type'))
                        ->options(array_reduce(ComputerType::cases(), function ($result, $type) {
                            $result[$type->value] = $type->getLabel();

                            return $result;
                        }, []))
                        ->default(ComputerType::other->value)
                        ->rules('required'),
                    Forms\Components\FileUpload::make('avatar')
                        ->disk('public')
                        ->preserveFilenames()
                        ->directory('images/avatars'),
                    Forms\Components\Toggle::make('inspect')
                        ->label(__('Check').' ?')
                        ->inline(false),
                ])
                ->columns(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->heading(__('Computers'))
            ->description(__('Manage/customize network computers.'))
            ->columns([
                ImageColumn::make('avatar')
                    ->circular()
                    ->placeholder('None'),
                self::textColumnGeneric('name', 'Computer'),
                self::textColumnGeneric('status', 'Status')
                    ->badge()
                    ->color(fn (string $state,
                        $record): string => match ($state) {
                            'online' => 'success',
                            'offline' => 'danger',
                            default => $record->inspect ? 'warning' : 'default',
                        }),
                self::textColumnGeneric('ip', 'IP address')
                    ->toggleable(isToggledHiddenByDefault: true),
                self::textColumnGeneric('mac', 'MAC address')
                    ->placeholder('Unknown')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('type'),
                self::textColumnGeneric('type', 'Type'),
                self::textColumnGeneric('last_check', 'Last check')
                    ->time(),
                ToggleColumn::make('inspect')
                    ->label(__('Check')),
            ])
            ->persistSortInSession()
            ->filters([//
            ])
            ->actions([//
            ])
            ->bulkActions([//
            ])
            ->defaultSort('ip');
    }

    public static function getRelations(): array
    {
        return [//
        ];
    }

    /**
     * @return array|PageRegistration[]
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComputers::route('/'),
            'create' => Pages\CreateComputer::route('/create'),
            //'view' => Pages\ViewComputer::route('/{record}'),
            'edit' => Pages\EditComputer::route('/{record}/edit'),
        ];
    }
}
