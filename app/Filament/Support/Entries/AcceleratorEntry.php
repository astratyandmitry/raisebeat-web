<?php

declare(strict_types=1);

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
            ->url(fn (Model $record): string => AcceleratorResource::getIndexUrl([
                'tableAction' => 'view',
                'tableActionRecord' => $record->getAttribute('accelerator_id'),
            ]));
    }
}
