<?php

declare(strict_types=1);

namespace App\Filament\Resources\Media\Schemas;

use App\Models\Media;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class MediaInfolist
{
    public static function entries(): array
    {
        return [
            Fieldset::make('Media')
                ->columns(1)
                ->schema([
                    TextEntry::make('type')->badge()->color('gray'),
                    TextEntry::make('official_url')
                        ->label('Official URL'),
                    TextEntry::make('submission_url')
                        ->label('Submission URL')
                        ->visible(fn(Media $record) => ! empty($record->submission_url)),
                    IconEntry::make('is_public')->label('Public')->boolean(),
                ]),
        ];
    }
}
