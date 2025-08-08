<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Schemas;

use App\Filament\Support\Entries\DatesFieldset;
use Filament\Infolists\Components\TextEntry;
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

                DatesFieldset::make(),
            ]);
    }
}
