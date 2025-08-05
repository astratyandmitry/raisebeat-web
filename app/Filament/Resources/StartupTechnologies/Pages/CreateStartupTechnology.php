<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupTechnologies\Pages;

use App\Filament\Resources\StartupTechnologies\StartupTechnologyResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateStartupTechnology extends CreateRecord
{
    protected static string $resource = StartupTechnologyResource::class;
}
