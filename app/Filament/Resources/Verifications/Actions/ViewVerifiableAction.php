<?php

declare(strict_types=1);

namespace App\Filament\Resources\Verifications\Actions;

use App\Models\Verification;
use Filament\Actions\Action;

final class ViewVerifiableAction
{
    public static function make(): Action
    {
        return Action::make('view')
            ->url(fn (Verification $record): string => route("filament.admin.resources.{$record->verifiable_type}.view", $record->verifiable_id))
            ->hiddenLabel()
            ->openUrlInNewTab()
            ->icon('heroicon-o-eye');
    }
}
