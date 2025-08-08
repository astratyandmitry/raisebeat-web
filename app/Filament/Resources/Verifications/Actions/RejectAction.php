<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Actions;

use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Forms\Components\Textarea;

abstract class RejectAction
{
    abstract protected static function configure(): Action|BulkAction;

    public static function make(): Action|BulkAction
    {
        return static::configure()
            ->icon('heroicon-s-x-mark')
            ->label('Reject')
            ->color('danger')
            ->requiresConfirmation()
            ->deselectRecordsAfterCompletion()
            ->schema([
                Textarea::make('comment')
                    ->label('Reason')
                    ->required()
                    ->minLength(10)
                    ->maxLength(500),
            ]);
    }
}
