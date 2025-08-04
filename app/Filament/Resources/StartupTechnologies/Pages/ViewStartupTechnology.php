<?php

namespace App\Filament\Resources\StartupTechnologies\Pages;

use App\Filament\Resources\StartupTechnologies\StartupTechnologyResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewStartupTechnology extends ViewRecord
{
    protected static string $resource = StartupTechnologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
