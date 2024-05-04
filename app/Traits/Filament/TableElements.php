<?php

namespace App\Traits\Filament;

use Filament\Tables;

trait TableElements
{
    /**
     * Create a generic text column for a Filament table.
     *
     * @param  string  $name  The name of the column.
     * @param  string  $label  The label of the column.
     * @param  bool  $money  Whether the column should display money values.
     * @return \Filament\Tables\Columns\TextColumn The created text column.
     */
    public static function textColumnGeneric(string $name, string $label, bool $money = false)
    {
        $column = Tables\Columns\TextColumn::make($name);
        $column = ($name === 'id') ? $column->hidden()
            : $column;
        $column = ($money === true) ? $column->money('EUR', 100, locale: 'de')
            : $column;

        return $column->label(__($label))
            ->sortable()
            ->searchable();
    }
}
