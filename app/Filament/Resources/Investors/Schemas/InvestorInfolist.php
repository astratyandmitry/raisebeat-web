<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors\Schemas;

use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\UserFieldset;
use App\Filament\Support\Entries\UuidEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

final class InvestorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->inlineLabel()
            ->components([
                UuidEntry::make(),
                TextEntry::make('focus_headline'),
                TextEntry::make('focus_region')
                    ->color('gray')
                    ->badge(),

                Fieldset::make('Check')
                    ->columns(2)
                    ->inlineLabel(false)
                    ->schema([
                        TextEntry::make('check_size_min')
                            ->label('Min size')
                            ->numeric(),
                        TextEntry::make('check_size_max')
                            ->label('Max size')
                            ->numeric(),
                    ]),

                UserFieldset::make(),
                DatesFieldset::make(),
            ]);
    }
}
