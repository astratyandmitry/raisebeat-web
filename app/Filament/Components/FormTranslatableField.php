<?php

namespace App\Filament\Components;

use App\Models\Enums\Language;
use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Illuminate\Contracts\Support\Htmlable;

final class FormTranslatableField
{
    public static function make(string $attribute, ?string $heading): Section
    {
        $schema = [];

        foreach (Language::cases() as $language) {
            $locale = strtolower($language->value);
            $schema[] = TextInput::make("$attribute.$locale")
                ->label($language->label())
                ->required();
        }

        return Section::make($heading ?? $attribute)->schema($schema);
    }
}
