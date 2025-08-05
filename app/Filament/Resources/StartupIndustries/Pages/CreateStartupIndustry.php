<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupIndustries\Pages;

use App\Filament\Resources\StartupIndustries\StartupIndustryResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateStartupIndustry extends CreateRecord
{
    protected static string $resource = StartupIndustryResource::class;
}
