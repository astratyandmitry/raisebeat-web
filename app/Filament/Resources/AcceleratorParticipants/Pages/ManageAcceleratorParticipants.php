<?php

namespace App\Filament\Resources\AcceleratorParticipants\Pages;

use App\Filament\Resources\AcceleratorParticipants\AcceleratorParticipantResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

final class ManageAcceleratorParticipants extends ManageRecords
{
    protected static string $resource = AcceleratorParticipantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create'),
        ];
    }
}
