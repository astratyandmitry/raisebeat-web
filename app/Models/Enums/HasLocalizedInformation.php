<?php

declare(strict_types=1);

namespace App\Models\Enums;

trait HasLocalizedInformation
{
    public function label(): string
    {
        return __('enums.'.static::class.'.'.$this->value);
    }

    /**
     * @return array<int|string, string>
     */
    public static function options(): array
    {
        return collect(static::cases())->mapWithKeys(fn($case) => [
            $case->value => $case->label(),
        ])->toArray();
    }
}
