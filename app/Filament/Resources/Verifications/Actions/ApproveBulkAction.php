<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Actions;

use App\Actions\Verification\ApproveVerificationAction;
use App\Models\Verification;
use Filament\Actions\BulkAction;
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;

final class ApproveBulkAction extends ApproveAction
{
    public static function configure(): BulkAction
    {
        return BulkAction::make('verification.approve')
            ->action(function (Collection $records, ApproveVerificationAction $cmd): void {
                $records->each(fn(Verification $el): Verification => $cmd->execute($el));
            })
            ->successNotification(function (Collection $records): void {
                Notification::make()->success()
                    ->title('Verifications Approved')
                    ->body("Count verifications: {$records->count()}")
                    ->send();
            });
    }
}
