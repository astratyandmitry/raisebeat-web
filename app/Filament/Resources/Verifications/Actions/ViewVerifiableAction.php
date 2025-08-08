<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Actions;

use App\Filament\Support\Helpers\MorphRoute;
use App\Models\Verification;
use Filament\Actions\Action;

final class ViewVerifiableAction
{
    public static function make(): Action
    {
        return Action::make('view')
            ->url(fn(Verification $record): string => MorphRoute::make($record, 'verifiable'))
            ->hiddenLabel()
            ->openUrlInNewTab()
            ->icon('heroicon-s-eye');
    }
}
