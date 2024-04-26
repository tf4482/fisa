<?php

/**
 * FILEPATH: /c:/Users/Tobias/projects/php/fisa/app/Filament/Resources/BaseEditRecord.php
 *
 * This file contains the `BaseEditRecord` class, which is an abstract class that extends the `EditRecord` class from the Filament package.
 * It provides common functionality for editing records in Filament resources.
 */

namespace App\Filament\Resources;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Str;

abstract class BaseEditRecord extends EditRecord
{
    /**
     * getHeaderActions
     *
     * This method returns an array of actions that should be displayed in the header of the edit page.
     * In this case, it returns an array with a single DeleteAction.
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    /**
     * getRedirectUrl
     *
     * This method returns the URL to which the user should be redirected after editing a record.
     * It returns the URL of the index of the resource.
     */
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    /**
     * ensureReferentialIntegrity
     *
     * This method checks the referential integrity of a record before it is deleted.
     * It takes a resource class and an array of constraint classes.
     * For each constraint class, it checks if there are any records that reference the current record.
     * If such records are found, it returns a DeleteAction with a custom description informing the user that the record cannot be deleted.
     *
     * @param  array  $constraintClasses
     */
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

    /**
     * getModelNamespace
     *
     * This method takes a resource class and returns the namespace of the associated model.
     * It simply replaces the "Resource" suffix with nothing and appends the resulting class name to the "App\Models" namespace.
     */
    protected function getModelNamespace(string $resourceClass): string
    {
        $model = Str::replaceLast('Resource', '', class_basename($resourceClass));

        return 'App\\Models\\'.$model;
    }

    /**
     * getModelLabel
     *
     * This method returns the label of the model for a given resource class.
     * It calls the static getModelLabel method of the resource class and converts the result to lowercase, unless the current application language is German.
     * In that case, it returns the result unchanged.
     */
    protected function getModelLabel(string $resourceClass): string
    {
        return app()->getLocale() === 'de' ? call_user_func([$resourceClass, 'getModelLabel']) : ucfirst(Str::lower(call_user_func([$resourceClass, 'getModelLabel'])));
    }
}
