<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class InvestorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('check_size_min')
                    ->numeric(),
                TextEntry::make('check_size_max')
                    ->numeric(),
                TextEntry::make('focus_headline'),
                TextEntry::make('focus_region'),
                TextEntry::make('count_viewed')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
