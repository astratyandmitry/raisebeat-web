<?php

declare(strict_types=1);

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
            ->schema(fn (Schema $schema): Schema => VerificationInfolist::configure($schema))
            ->extraModalFooterActions(fn (Verification $record): array => $record->status->isPending() ? [
                ApproveRecordAction::make(),
                RejectRecordAction::make(),
            ] : []);
    }
}
