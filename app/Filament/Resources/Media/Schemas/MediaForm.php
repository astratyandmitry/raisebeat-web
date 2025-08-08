<?php

declare(strict_types=1);

namespace App\Filament\Resources\Media\Schemas;

use App\Models\Enums\MediaType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;

final class MediaForm
{
    public static function fields(): array
    {
        return [
            Fieldset::make('Media')
                ->columns(1)
                ->schema([
                    Select::make('type')
                        ->options(MediaType::getOptions())
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
