<?php

namespace App\Filament\Resources\Investments\Schemas;

use App\Filament\Resources\Startups\StartupResource;
use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\OrganizationFieldset;
use App\Filament\Support\Helpers\MorphRoute;
use App\Models\Abstracts\Model;
use App\Models\Investment;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

final class InvestmentInfolist
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
                    ->url(fn(Investment $record) => StartupResource::getIndexUrl([
                        'tableAction' => 'view',
                        'tableActionRecord' => $record->startup_id,
                    ])),

                TextEntry::make("investable.name")
                    ->color('primary')
                    ->weight('medium')
                    ->iconColor('primary')
                    ->icon('heroicon-s-link')
                    ->openUrlInNewTab()
                    ->label(fn(Investment $record) => Str::title(Str::singular($record->investable_type)))
                    ->url(fn(Model $record) => MorphRoute::make($record, 'investable')),

                TextEntry::make('year')
                    ->label('Period')
                    ->formatStateUsing(fn(Investment $record) => "{$record->year}, {$record->quarter->getLabel()}"),
                TextEntry::make('amount_usd')
                    ->label('Amount')
                    ->money('usd'),
                IconEntry::make('is_confirmed')
                    ->label('Confirmed')
                    ->boolean(),

                DatesFieldset::make(),
            ]);
    }
}
