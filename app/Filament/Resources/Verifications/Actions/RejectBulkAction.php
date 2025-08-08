<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Actions;

use App\Actions\Verification\RejectVerificationAction;
use App\Models\Verification;
use Filament\Actions\BulkAction;
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;

final class RejectBulkAction extends RejectAction
{
    public static function configure(): BulkAction
    {
        return BulkAction::make('verification.reject')
            ->action(function (Collection $records, RejectVerificationAction $cmd, array $data): void {
                $records->each(fn (Verification $el): Verification => $cmd->execute($el, $data['comment']));
            })
            ->successNotification(function (Collection $records): void {
                Notification::make()->danger()
                    ->title('Verifications Rejected')
                    ->body("Count verifications: {$records->count()}")
                    ->send();
            });
    }
}
