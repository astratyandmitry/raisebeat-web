<?php

declare(strict_types=1);

namespace App\Filament\Support\Helpers;

use App\Models\Abstracts\Model;

final class MorphRoute
{
    public static function make(Model $record, string $morph): string
    {
        $type = "{$morph}_type";
        $id = "{$morph}_id";

        return route("filament.admin.resources.{$record->getAttribute($type)}.index", [
            'tableAction' => 'view',
            'tableActionRecord' => $record->getAttribute($id),
        ]);
    }
}
