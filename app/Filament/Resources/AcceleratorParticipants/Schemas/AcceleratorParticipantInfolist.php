<?php

namespace App\Filament\Resources\AcceleratorParticipants\Schemas;

use App\Filament\Resources\Accelerators\AcceleratorResource;
use App\Filament\Support\Entries\AcceleratorEntry;
use App\Filament\Support\Entries\ConfirmedEntry;
use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\StartupEntry;
use App\Filament\Support\Entries\UuidEntry;
use App\Filament\Support\Entries\YearQuarterEntry;
use App\Models\AcceleratorParticipant;
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
                UuidEntry::make(),
                AcceleratorEntry::make(),
                StartupEntry::make(),
                YearQuarterEntry::make(),
                ConfirmedEntry::make(),
                DatesFieldset::make(),
            ]);
    }
}
