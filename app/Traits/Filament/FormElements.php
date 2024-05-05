<?php

namespace App\Traits\Filament;

use Filament\Forms;

trait FormElements
{
    /**
     * Create a generic text input form element.
     *
     * @param  string  $name  The name of the input field.
     * @param  string  $label  The label for the input field.
     * @param  bool  $required  Whether the input field is required or not.
     * @param  bool  $money  Whether the input field is for money values or not.
     * @return \Filament\Forms\Components\TextInput The text input form element.
     */
    public static function textInputGeneric(string $name, string $label, bool $required = false, bool $money = false)
    {
        $column = Forms\Components\TextInput::make($name);
        $column = ($money === true) ? $column->rule('regex:/^\d{1,7}(\,\d{1,3}){0,1}(\.\d{1,2})?$/')
            ->suffixIcon('heroicon-c-currency-euro')
            ->default(0)
            : $column;

        return $column->label(__($label))
            ->required($required);
    }

    /**
     * Create a generic text input area form element.
     *
     * @return \Filament\Forms\Components\TextArea The text input area form element.
     */
    public static function textInputArea()
    {
        return Forms\Components\TextArea::make('description')
            ->label(__('description'))
            ->rows(3)
            ->columnSpanFull();
    }

    /**
     * Create a generic select form element.
     *
     * @param  string  $name  The name of the select field.
     * @param  string  $label  The label for the select field.
     * @param  string  $relationship  The relationship for the select field.
     * @param  string  $display  The display for the select field.
     * @return \Filament\Forms\Components\Select The select form element.
     */
    public static function selectGeneric(string $name, string $label, string $relationship, string $display)
    {
        return Forms\Components\Select::make($name)
            ->label(__($label))
            ->relationship($relationship, $display)
            ->required();
    }
}
