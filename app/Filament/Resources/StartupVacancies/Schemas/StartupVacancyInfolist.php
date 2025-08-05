<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StartupVacancyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('startup.name')
                    ->numeric(),
                TextEntry::make('type'),
                TextEntry::make('title'),
                TextEntry::make('description'),
                TextEntry::make('feedback_email'),
                TextEntry::make('count_views')
                    ->numeric(),
                IconEntry::make('is_applicable')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
