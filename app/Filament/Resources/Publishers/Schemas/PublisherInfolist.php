<?php

declare(strict_types=1);

namespace App\Filament\Resources\Publishers\Schemas;

use App\Models\Publisher;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class PublisherInfolist
{
    public static function entries(): array
    {
        return [
            Fieldset::make('Publisher')
                ->columns(1)
                ->schema([
                    TextEntry::make('type')->badge()->color('gray'),
                    TextEntry::make('official_url')
                        ->label('Official URL'),
                    TextEntry::make('submission_url')
                        ->label('Submission URL')
                        ->visible(fn (Publisher $record): bool => ! empty($record->submission_url)),
                    IconEntry::make('is_public')->label('Public')->boolean(),
                ]),
        ];
    }
}
