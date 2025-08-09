<?php

namespace App\Filament\Resources\AcceleratorParticipants\Schemas;

use App\Filament\Resources\Accelerators\AcceleratorResource;
use App\Filament\Resources\Startups\StartupResource;
use App\Filament\Support\Entries\DatesFieldset;
use App\Models\AcceleratorParticipant;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class AcceleratorParticipantInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->inlineLabel()
            ->components([
                TextEntry::make('uuid')
                    ->label('UUID'),

                TextEntry::make('accelerator.name')
                    ->color('primary')
                    ->weight('medium')
                    ->iconColor('primary')
                    ->icon('heroicon-s-link')
                    ->openUrlInNewTab()
                    ->label('Startup')
                    ->url(fn(AcceleratorParticipant $record) => AcceleratorResource::getIndexUrl([
                        'tableAction' => 'view',
                        'tableActionRecord' => $record->accelerator_id,
                    ])),

                TextEntry::make('startup.name')
                    ->color('primary')
                    ->weight('medium')
                    ->iconColor('primary')
                    ->icon('heroicon-s-link')
                    ->openUrlInNewTab()
                    ->label('Startup')
                    ->url(fn(AcceleratorParticipant $record) => StartupResource::getIndexUrl([
                        'tableAction' => 'view',
                        'tableActionRecord' => $record->startup_id,
                    ])),

                TextEntry::make('year')
                    ->label('Period')
                    ->formatStateUsing(fn(AcceleratorParticipant $record
                    ) => "{$record->year}, {$record->quarter->getLabel()}"),
                IconEntry::make('is_confirmed')
                    ->label('Confirmed')
                    ->boolean(),

                DatesFieldset::make(),
            ]);
    }
}
