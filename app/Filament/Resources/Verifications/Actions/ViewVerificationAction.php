<?php

namespace App\Filament\Resources\Verifications\Actions;

use App\Filament\Resources\Verifications\Schemas\VerificationInfolist;
use App\Models\Verification;
use Filament\Actions\ViewAction;
use Filament\Schemas\Schema;

final class ViewVerificationAction
{
    public static function make(): ViewAction
    {
        return ViewAction::make('view')
            ->hiddenLabel()
            ->color('gray')
            ->schema(fn(Schema $schema) => VerificationInfolist::configure($schema))
            ->extraModalFooterActions(function (Verification $record) {
                return $record->status->isPending() ? [
                    ApproveRecordAction::make(),
                    RejectRecordAction::make(),
                ] : [];
            });
    }
}
