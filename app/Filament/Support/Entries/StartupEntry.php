<?php

namespace App\Filament\Support\Entries;

use App\Filament\Resources\Startups\StartupResource;
use App\Models\Abstracts\Model;
use Filament\Infolists\Components\TextEntry;

final class StartupEntry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('startup.name')
            ->color('primary')
            ->weight('medium')
            ->iconColor('primary')
            ->icon('heroicon-s-link')
            ->openUrlInNewTab()
            ->label('Startup')
            ->url(fn(Model $record) => StartupResource::getIndexUrl([
                'tableAction' => 'view',
                'tableActionRecord' => $record->getAttribute('startup_id'),
            ]));
    }
}
