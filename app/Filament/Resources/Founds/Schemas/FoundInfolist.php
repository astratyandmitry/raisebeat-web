<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Schemas;

use App\Filament\Support\Entries\LocationEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class FoundInfolist
{
    public static function entries(): array
    {
        return [
            Fieldset::make('Found')
                ->columns(1)
                ->schema([
                    LocationEntry::make(),
                    TextEntry::make('focus_region')->badge()->color('gray'),
                    TextEntry::make('investment_model')->badge()->color('gray'),
                    TextEntry::make('founded_year'),

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

                    Fieldset::make('Config')->columns(3)
                        ->inlineLabel(false)
                        ->schema([
                            IconEntry::make('is_lead_investor')
                                ->label('Lead Investor')
                                ->boolean(),
                            IconEntry::make('is_follow_investor')
                                ->label('Follow Investor')
                                ->boolean(),
                            IconEntry::make('is_public')
                                ->label('Public')
                                ->boolean(),
                        ]),
                ]),
        ];
    }
}
