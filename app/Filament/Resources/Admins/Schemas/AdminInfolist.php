<?php

declare(strict_types=1);

namespace App\Filament\Resources\Admins\Schemas;

use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\UuidEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class AdminInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->columns(1)
            ->components([
                UuidEntry::make(),
                TextEntry::make('name'),
                TextEntry::make('email'),
                DatesFieldset::make(),
            ]);
    }
}
