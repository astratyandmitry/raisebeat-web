<?php

declare(strict_types=1);

namespace App\Filament\Components\Translatable;

use App\Models\Abstracts\Dictionary;
use App\Models\Enums\Language;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class InfolistTranslatableTextEntry
{
    public static function make(string $attribute, ?string $heading): Fieldset
    {
        $schema = [];

        foreach (Language::cases() as $language) {
            $locale = strtolower($language->value);
            $schema[] = TextEntry::make('name')
                ->label($language->label())
                ->state(fn (Dictionary $record): string => $record->getTranslation($attribute, $locale));
        }

        return Fieldset::make($heading ?? $attribute)->inlineLabel()->columns(1)->schema($schema);
    }
}
