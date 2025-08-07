<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Actions;

use App\Actions\Verification\RejectVerificationAction;
use App\Models\Verification;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

final class RejectRecordAction extends RejectAction
{
    protected static function configure(): Action
    {
        return Action::make('verification.reject')
            ->action(function (Verification $record, RejectVerificationAction $cmd, array $data): void {
                $cmd->execute($record, $data['comment']);
            })
            ->successNotification(function (Verification $record): void {
                Notification::make()->danger()
                    ->title('Verification Rejected')
                    ->body($record->uuid)
                    ->send();
            });
    }
}
