<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupProductTypes\Schemas;

use App\Filament\Schemas\Components\TranslatableInput;
use App\Models\Enums\Language;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Layout\Split;

final class StartupProductTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->schema([
                        Grid::make()->schema([
                            TextInput::make('uuid')
                                ->label('UUID')
                                ->disabled()
                                ->required(),
                            TextInput::make('key')
                                ->disabled()
                                ->required(),
                        ]),
                    ]),

                TranslatableInput::make('name'),
            ]);
    }

    protected static function getTranslatable(string $key): Section
    {
        $schema = [];

        foreach (Language::cases() as $language) {
            $locale = strtolower($language->value);
            $schema[] = TextInput::make("name.$locale")
                ->label($language->label())
                ->required();
        }

        return Section::make($key)->schema($schema);
    }
}
