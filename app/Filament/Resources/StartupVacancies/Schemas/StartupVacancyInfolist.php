<?php

namespace App\Filament\Resources\StartupVacancies\Schemas;

use App\Models\StartupVacancy;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class StartupVacancyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->columns(1)
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('startup.name')
                    ->label('Startup'),
                TextEntry::make('type'),
                TextEntry::make('title'),
                TextEntry::make('description'),
                TextEntry::make('content')
                    ->formatStateUsing(fn(StartupVacancy $record) => nl2br($record->content))
                    ->html(),
                TextEntry::make('feedback_email'),
                IconEntry::make('is_applicable')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime('Y-m-d H:i'),
                TextEntry::make('updated_at')
                    ->dateTime('Y-m-d H:i'),
                TextEntry::make('deleted_at')
                    ->placeholder('Entity is not deleted.')
                    ->dateTime('Y-m-d H:i'),
            ]);
    }
}
