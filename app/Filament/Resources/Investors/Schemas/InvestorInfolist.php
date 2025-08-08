<?php

declare(strict_types=1);

namespace App\Filament\Resources\Investors\Schemas;

use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\UserFieldset;
use App\Filament\Support\Entries\UsernameEntry;
use App\Models\Investor;
use App\Models\User;
use Filament\Infolists\Components\ImageEntry;
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
                TextEntry::make('uuid')
                    ->label('UUID'),
                TextEntry::make('check_size_min')
                    ->numeric(),
                TextEntry::make('check_size_max')
                    ->numeric(),
                TextEntry::make('focus_headline'),
                TextEntry::make('focus_region')
                    ->color('gray')
                    ->badge(),

                UserFieldset::make(),
                DatesFieldset::make(),
            ]);
    }
}
