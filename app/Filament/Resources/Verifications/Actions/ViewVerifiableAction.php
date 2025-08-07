<?php

namespace App\Filament\Resources\Verifications\Actions;

use App\Models\Verification;
use Filament\Actions\Action;

final class ViewVerifiableAction
{
    public static function make(): Action
    {
        return Action::make('view')
            ->url(function (Verification $record): string {
                return route("filament.admin.resources.{$record->verifiable_type}.view", $record->verifiable_id);
            })
            ->hiddenLabel()
            ->openUrlInNewTab()
            ->icon('heroicon-o-eye');
    }
}
