<?php

namespace App\Filament\Resources\StartupTechnologies\Pages;

use App\Filament\Resources\StartupTechnologies\StartupTechnologyResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStartupTechnology extends EditRecord
{
    protected static string $resource = StartupTechnologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
