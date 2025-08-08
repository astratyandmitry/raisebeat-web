<?php

namespace App\Filament\Support\Actions;

use App\Filament\Resources\Verifications\VerificationResource;
use App\Models\Contracts\Verifiable;
use App\Models\Enums\VerificationStatus;
use Filament\Actions\Action;

final class GoToVerififcationAction
{
    public static function make(): Action
    {
        return Action::make('verification')
            ->color('primary')
            ->label('Verification')
            ->icon('heroicon-s-shield-exclamation')
            ->openUrlInNewTab()
            ->url(fn(Verifiable $record): string => VerificationResource::getIndexUrl([
                'tableAction' => 'view',
                'tableActionRecord' => $record->latest_verification->id,
            ]))
            ->visible(fn(Verifiable $record) => $record->latest_verification?->status === VerificationStatus::Pending);
    }
}
