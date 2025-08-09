<?php

namespace App\Filament\Support\Entries;

use App\Filament\Resources\Accelerators\AcceleratorResource;
use App\Models\Abstracts\Model;
use Filament\Infolists\Components\TextEntry;

final class AcceleratorEntry
{
    public static function make(): TextEntry
    {
        return TextEntry::make('accelerator.name')
            ->color('primary')
            ->weight('medium')
            ->iconColor('primary')
            ->icon('heroicon-s-link')
            ->openUrlInNewTab()
            ->label('Startup')
            ->url(fn(Model $record) => AcceleratorResource::getIndexUrl([
                'tableAction' => 'view',
                'tableActionRecord' => $record->getAttribute('accelerator_id'),
            ]));
    }
}
