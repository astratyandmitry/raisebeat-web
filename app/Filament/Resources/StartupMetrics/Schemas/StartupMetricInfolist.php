<?php

namespace App\Filament\Resources\StartupMetrics\Schemas;

use App\Filament\Resources\Startups\StartupResource;
use App\Filament\Support\Entries\DatesFieldset;
use App\Models\StartupMetric;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class StartupMetricInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->inlineLabel()
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),

                TextEntry::make('startup.name')
                    ->color('primary')
                    ->weight('medium')
                    ->iconColor('primary')
                    ->icon('heroicon-s-link')
                    ->openUrlInNewTab()
                    ->label('Startup')
                    ->url(fn(StartupMetric $record) => StartupResource::getIndexUrl([
                        'tableAction' => 'view',
                        'tableActionRecord' => $record->startup_id,
                    ])),

                TextEntry::make('year')
                    ->label('Period')
                    ->formatStateUsing(fn(StartupMetric $record) => "{$record->year}, {$record->quarter->getLabel()}"),

                TextEntry::make('value')
                    ->label('Period')
                    ->formatStateUsing(fn(StartupMetric $record) => "{$record->value}, {$record->type->value}"),
                IconEntry::make('is_confirmed')
                    ->label('Confirmed')
                    ->boolean(),

                DatesFieldset::make(),
            ]);
    }
}
