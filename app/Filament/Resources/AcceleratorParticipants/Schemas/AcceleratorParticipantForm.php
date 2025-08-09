<?php

declare(strict_types=1);

namespace App\Filament\Resources\AcceleratorParticipants\Schemas;

use App\Filament\Support\Forms\AcceleratorSelect;
use App\Filament\Support\Forms\StartupSelect;
use App\Filament\Support\Forms\UuidInput;
use App\Filament\Support\Forms\YearQuarterSelectGroup;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

final class AcceleratorParticipantForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                UuidInput::make(),
                Grid::make(2)
                    ->schema([
                        AcceleratorSelect::make()->required(),
                        StartupSelect::make()->required(),
                    ]),
                YearQuarterSelectGroup::make(),
            ]);
    }
}
