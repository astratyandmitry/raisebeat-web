<?php

declare(strict_types=1);

namespace App\Filament\Resources\Accelerators\Schemas;

use App\Filament\Support\Entries\LocationEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Fieldset;

final class AcceleratorInfolist
{
    public static function entries(): array
    {
        return [
            Fieldset::make('Accelerator')
                ->columns(1)
                ->schema([
                    LocationEntry::make(),
                    TextEntry::make('founded_year')->numeric(),
                    IconEntry::make('is_public')->label('Public')->boolean(),
                ]),
        ];
    }
}
