<?php

namespace App\Traits;

use Filament\Actions;
use Illuminate\Support\Str;

trait EnsureReferentialIntegrity
{
    protected function ensureReferentialIntegrity(string $resourceClass, ...$constraintClasses): ?array
    {
        $record = $this->getRecord();

        $resourceModelNamespace = $this->getModelNamespace($resourceClass);

        foreach ($constraintClasses as $constraintClass) {
            $constraintModelNamespace = $this->getModelNamespace($constraintClass);

            $constraintKey = Str::snake(class_basename($resourceModelNamespace)).'_id';

            $constraintCount = $constraintModelNamespace::where($constraintKey, $record->getKey())->count();

            $resourceLabel = $this->getModelLabel($resourceClass);
            $constraintLabel = $this->getModelLabel($constraintClass);

            if ($constraintCount > 0) {
                return [
                    Actions\DeleteAction::make()
                        ->modalDescription($resourceLabel.' '.__('cannot be removed! There is at least one').' '.$constraintLabel.' '.__('linked').'.')
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

    protected function getModelNamespace(string $resourceClass): string
    {
        $model = Str::replaceLast('Resource', '', class_basename($resourceClass));

        return 'App\\Models\\'.$model;
    }

    protected function getModelLabel(string $resourceClass): string
    {
        return app()->getLocale() === 'de' ? call_user_func([$resourceClass, 'getModelLabel']) : ucfirst(Str::lower(call_user_func([$resourceClass, 'getModelLabel'])));
    }
}
