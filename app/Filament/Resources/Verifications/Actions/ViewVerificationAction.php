<?php

namespace App\Filament\Resources\Verifications\Actions;

use App\Filament\Resources\Verifications\Schemas\VerificationInfolist;
use Filament\Actions\Action;
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
            ->extraModalFooterActions([
                Action::make('approve')
                    ->label('Approve')
                    ->color('success')
                    ->action(fn($record) => $record->approve()),

                Action::make('reject')
                    ->label('Reject')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->action(fn($record) => $record->reject()),
            ]);
    }
}
