<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Schemas;

use App\Filament\Resources\Startups\StartupResource;
use App\Filament\Support\Entries\DatesFieldsetEntry;
use App\Filament\Support\Entries\HtmlEntry;
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
                    ->label('Startup')
                    ->color('primary')
                    ->weight('medium')
                    ->iconColor('primary')
                    ->icon('heroicon-s-link')
                    ->url(fn (StartupVacancy $record): string => StartupResource::getIndexUrl([
                        'tableAction' => 'view',
                        'tableActionRecord' => $record->id,
                    ]))
                    ->openUrlInNewTab(),

                TextEntry::make('type')->badge(),
                TextEntry::make('title'),
                TextEntry::make('description'),
                HtmlEntry::make('content'),
                TextEntry::make('feedback_email'),
                IconEntry::make('is_applicable')
                    ->boolean(),

                DatesFieldsetEntry::make(),
            ]);
    }
}
