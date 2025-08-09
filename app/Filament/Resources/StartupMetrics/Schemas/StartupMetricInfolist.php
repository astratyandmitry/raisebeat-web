<?php

namespace App\Filament\Resources\StartupMetrics\Schemas;

use App\Filament\Support\Entries\ConfirmedEntry;
use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\StartupEntry;
use App\Filament\Support\Entries\UuidEntry;
use App\Filament\Support\Entries\YearQuarterEntry;
use App\Models\StartupMetric;
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
                UuidEntry::make(),
                StartupEntry::make(),
                YearQuarterEntry::make(),
                TextEntry::make('value')
                    ->label('Period')
                    ->formatStateUsing(fn(StartupMetric $record) => "{$record->value}, {$record->type->value}"),
                ConfirmedEntry::make(),
                DatesFieldset::make(),
            ]);
    }
}
