<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Actions;

use App\Actions\Verification\ApproveVerificationAction;
use App\Models\Verification;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

final class ApproveRecordAction extends ApproveAction
{
    public static function configure(): Action
    {
        return Action::make('verification.approve')
            ->cancelParentActions()
            ->action(function (Verification $record, Action $action, ApproveVerificationAction $cmd): void {
                $cmd->execute($record);
            })
            ->successNotification(function (Verification $record): void {
                Notification::make()->success()
                    ->title('Verification Approved')
                    ->body($record->uuid)
                    ->send();
            });
    }
}
