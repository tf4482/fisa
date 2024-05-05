<?php

namespace App\Traits\Filament;

use Filament\Actions;
use Illuminate\Support\Str;

trait ActionElements
{
    protected function safeDataDeleteOnAction(string $resourceClass, ...$constraintClasses): ?array
    {
        $record = $this->getRecord();

        $resourceModel = Str::replaceLast('Resource', '', class_basename($resourceClass));

        foreach ($constraintClasses as $constraintClass) {
            $constraintModel = Str::replaceLast('Resource', '', class_basename($constraintClass));
            $constraintModelNamespace = 'App\\Models\\'.$constraintModel;

            $constraintKey = Str::after(Str::snake($resourceModel).'_id', '\\Models\\');

            $constraintCount = $constraintModelNamespace::where($constraintKey, $record->getKey())->count();

            if ($constraintCount > 0) {
                $resourceLabel = app()->getLocale() === 'de' ? call_user_func([$resourceClass, 'getModelLabel']) : ucfirst(Str::lower(call_user_func([$resourceClass, 'getModelLabel'])));

                $constraintLabel = app()->getLocale() === 'de' ? call_user_func([$constraintClass, 'getModelLabel']) : ucfirst(Str::lower(call_user_func([$constraintClass, 'getModelLabel'])));

                return [
                    Actions\DeleteAction::make()
                        ->modalDescription($resourceLabel.' '.__('cannot be deleted because there is still at least one').' '.$constraintLabel.' '.__('associated').'.')
                        ->modalSubmitAction(false)
                        ->modalCancelAction(function (Actions\StaticAction $action) {
                            return $action->label(__('Close'));
                        }),
                ];
            }
        }

        return [
            Actions\DeleteAction::make(),
        ];
    }
}
