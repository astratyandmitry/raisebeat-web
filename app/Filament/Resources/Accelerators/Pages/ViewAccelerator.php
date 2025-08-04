<?php

namespace App\Filament\Resources\Accelerators\Pages;

use App\Filament\Resources\Accelerators\AcceleratorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAccelerator extends ViewRecord
{
    protected static string $resource = AcceleratorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
