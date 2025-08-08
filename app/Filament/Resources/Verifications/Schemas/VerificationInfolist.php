<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Schemas;

use App\Filament\Support\Entries\HtmlEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class VerificationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->inlineLabel()
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),

                TextEntry::make('status')
                    ->badge(),
                HtmlEntry::make('comment'),

                Fieldset::make('Dates')
                    ->inlineLabel(false)
                    ->columns(2)
                    ->schema([
                        TextEntry::make('requested_at')
                            ->label('Requested')
                            ->dateTime('Y-m-d H:i'),
                        TextEntry::make('responded_at')
                            ->label('Responded')
                            ->placeholder('None')
                            ->dateTime('Y-m-d H:i'),
                    ]),
            ]);
    }
}
