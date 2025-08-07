<?php

declare(strict_types=1);

namespace App\Filament\Support\Actions;

use App\Models\Contracts\HasPublicUrl;
use Filament\Actions\Action;

final class ViewPublicUrlAction
{
    public static function make(): Action
    {
        return Action::make('view-public-url')
            ->label('Public URL')
            ->icon('heroicon-o-link')
            ->openUrlInNewTab()
            ->color('gray')
            ->url(fn (HasPublicUrl $record): string => $record->getPublicUrl());
    }
}
