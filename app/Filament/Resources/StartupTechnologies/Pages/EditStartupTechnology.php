<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupTechnologies\Pages;

use App\Filament\Resources\StartupTechnologies\StartupTechnologyResource;
use Filament\Resources\Pages\EditRecord;

final class EditStartupTechnology extends EditRecord
{
    protected static string $resource = StartupTechnologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
