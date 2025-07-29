<?php

namespace App\Support\Traits;

trait HasLocalizedInformation
{
    public function label(): string
    {
        return __('enums.'.static::class.'.'.$this->value);
    }

    public static function options(): array
    {
        return collect(static::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label(),
        ])->toArray();
    }
}
