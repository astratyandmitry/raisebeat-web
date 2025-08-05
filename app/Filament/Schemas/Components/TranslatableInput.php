<?php

namespace App\Filament\Schemas\Components;

use App\Models\Enums\Language;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;

class TranslatableInput extends Component
{
    protected string $view = 'filament.schemas.components.translatable-input';


    public static function make(string $fieldName): static
    {
        return $instance->configure();
    }

    public function configure(): static
    {
        $fields = [];

        foreach (Language::cases() as $language) {
            $locale = strtolower($language->value);
            $fields[] = TextInput::make("name.{$locale}")
                ->label($language->label())
                ->required();
        }

        return $this->schema([
            Section::make('name')->schema($fields)
        ]);
    }
}
