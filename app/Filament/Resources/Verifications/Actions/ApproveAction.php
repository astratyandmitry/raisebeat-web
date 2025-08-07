<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Actions;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;

abstract class ApproveAction
{
    abstract protected static function configure(): Action|BulkAction;

    public static function make(): Action|BulkAction
    {
        return static::configure()
            ->icon('heroicon-o-check')
            ->label('Approve')
            ->color('success')
            ->deselectRecordsAfterCompletion()
            ->requiresConfirmation();
    }
}
