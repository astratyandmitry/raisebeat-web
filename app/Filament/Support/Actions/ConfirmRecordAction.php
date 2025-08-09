<?php

declare(strict_types=1);

namespace App\Filament\Support\Actions;

use App\Actions\Confirmation\ConfirmAction;
use App\Models\Contracts\Confirmable;
use Filament\Actions\Action;
use Filament\Notifications\Notification;

final class ConfirmRecordAction
{
    public static function make(): Action
    {
        return Action::make('confirm')
            ->icon('heroicon-s-check')
            ->label('Confirm')
            ->color('success')
            ->cancelParentActions()
            ->hidden(fn (Confirmable $record) => $record->is_confirmed)
            ->action(function (Confirmable $record, Action $action, ConfirmAction $cmd): void {
                $cmd->execute($record);
            })
            ->successNotification(function (Confirmable $record): void {
                Notification::make()->success()
                    ->title('Record Confirmed')
                    ->body($record->uuid)
                    ->send();
            });
    }
}
