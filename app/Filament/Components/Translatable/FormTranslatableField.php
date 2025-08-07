<?php

declare(strict_types=1);

namespace App\Filament\Components\Translatable;

use App\Models\Enums\Language;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;

final class FormTranslatableField
{
    public static function make(string $attribute, ?string $heading): Fieldset
    {
        $schema = [];

        foreach (Language::cases() as $language) {
            $locale = strtolower($language->value);
            $schema[] = TextInput::make("$attribute.$locale")
                ->label($language->getLabel())
                ->maxLength(80)
                ->required();
        }

        return Fieldset::make($heading ?? $attribute)->schema($schema);
    }
}
