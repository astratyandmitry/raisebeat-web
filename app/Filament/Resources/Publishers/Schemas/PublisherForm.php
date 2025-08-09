<?php

declare(strict_types=1);

namespace App\Filament\Resources\Publishers\Schemas;

use App\Models\Enums\PublisherType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;

final class PublisherForm
{
    public static function fields(): array
    {
        return [
            Fieldset::make('Publisher')
                ->columns(1)
                ->schema([
                    Select::make('type')
                        ->options(PublisherType::getOptions())
                        ->required(),
                    TextInput::make('official_url')
                        ->label('Official URL')
                        ->activeUrl()
                        ->maxLength(500)
                        ->required(),
                    TextInput::make('submission_url')
                        ->label('Submission URL')
                        ->activeUrl()
                        ->maxLength(500),
                    Toggle::make('is_public')->label('Public'),
                ]),
        ];
    }
}
