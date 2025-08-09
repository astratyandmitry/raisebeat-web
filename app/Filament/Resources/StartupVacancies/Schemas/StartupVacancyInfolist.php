<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupVacancies\Schemas;

use App\Filament\Support\Entries\DatesFieldset;
use App\Filament\Support\Entries\HtmlEntry;
use App\Filament\Support\Entries\StartupEntry;
use App\Filament\Support\Entries\UuidEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

final class StartupVacancyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->inlineLabel()
            ->columns(1)
            ->components([
                UuidEntry::make(),
                StartupEntry::make(),
                TextEntry::make('type')->badge(),
                TextEntry::make('title'),
                TextEntry::make('description'),
                HtmlEntry::make('content'),
                TextEntry::make('feedback_email'),
                IconEntry::make('is_applicable')->boolean(),
                DatesFieldset::make(),
            ]);
    }
}
