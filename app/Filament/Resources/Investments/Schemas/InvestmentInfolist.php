<?php

namespace App\Filament\Resources\Investments\Schemas;

use App\Filament\Support\Entries\ConfirmedEntry;
use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\StartupEntry;
use App\Filament\Support\Entries\UuidEntry;
use App\Filament\Support\Entries\YearQuarterEntry;
use App\Filament\Support\Helpers\MorphRoute;
use App\Models\Abstracts\Model;
use App\Models\Investment;
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
                UuidEntry::make(),
                StartupEntry::make(),
                TextEntry::make("investable.name")
                    ->color('primary')
                    ->weight('medium')
                    ->iconColor('primary')
                    ->icon('heroicon-s-link')
                    ->openUrlInNewTab()
                    ->label(fn(Investment $record) => Str::title(Str::singular($record->investable_type)))
                    ->url(fn(Model $record) => MorphRoute::make($record, 'investable')),
                YearQuarterEntry::make(),
                TextEntry::make('amount_usd')
                    ->label('Amount')
                    ->money('usd'),
                ConfirmedEntry::make(),
                DatesFieldset::make(),
            ]);
    }
}
