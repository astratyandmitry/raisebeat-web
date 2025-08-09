<?php

declare(strict_types=1);

namespace App\Models\Enums;

use Filament\Support\Contracts\HasLabel;
use Illuminate\Support\Str;

enum Quarter: string implements HasLabel
{
    case Q1 = 'q1';
    case Q2 = 'q2';
    case Q3 = 'q3';
    case Q4 = 'q4';

    public function getLabel(): string
    {
        return Str::upper($this->value);
    }

    public static function getOptions(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($case) => [
            $case->value => $case->getLabel(),
        ])->toArray();
    }
}
