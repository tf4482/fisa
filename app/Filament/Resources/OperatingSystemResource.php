<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OperatingSystemResource\Pages;
use App\Models\OperatingSystem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OperatingSystemResource extends Resource
{
    protected static ?string $model = OperatingSystem::class;

    protected static ?string $navigationIcon = 'heroicon-c-user-group';

    public static function getModelLabel(): string
    {
        return __('Operating System');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Operating Systems');
    }

    public static function getNavigationGroup(): string
    {
        return __('Configuration');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('type')
                    ->label(__('Operating system type'))
                    ->required(),
                Forms\Components\TextInput::make('system')
                    ->label(__('System'))
                    ->required(),
                Forms\Components\TextInput::make('version')
                    ->label(__('Version'))
                    ->required(),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type')
                    ->label('Operating system type')
                    ->sortable()
                    ->searchable(isGlobal: true),
                Tables\Columns\TextColumn::make('system')
                    ->label('System')
                    ->sortable()
                    ->searchable(isGlobal: true),
                Tables\Columns\TextColumn::make('version')
                    ->label('Version')
                    ->sortable()
                    ->searchable(isGlobal: true),

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
            ->defaultSort('type', 'asc')
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
            'index' => Pages\ListOperatingSystems::route('/'),
            'create' => Pages\CreateOperatingSystem::route('/create'),
            'edit' => Pages\EditOperatingSystem::route('/{record}/edit'),
        ];
    }
}
