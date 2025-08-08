<?php

namespace App\Filament\Resources\Verifications\Pages;

use App\Filament\Resources\Verifications\VerificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVerification extends ViewRecord
{
    protected static string $resource = VerificationResource::class;

    protected function getHeaderActions(): array
    {
        dd(123123);

        return [
            Actions\Action::make('approve')
                ->label('Approve')
                ->color('success')
                ->action(fn() => $this->record->approve()),

            Actions\Action::make('reject')
                ->label('Reject')
                ->color('danger')
                ->action(fn() => $this->record->reject()),
        ];
    }
}
