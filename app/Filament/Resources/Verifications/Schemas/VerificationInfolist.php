<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class VerificationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('verifiable_type'),
                TextEntry::make('verifiable_id')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('comment'),
                TextEntry::make('requested_at')
                    ->dateTime(),
                TextEntry::make('responded_at')
                    ->dateTime(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
