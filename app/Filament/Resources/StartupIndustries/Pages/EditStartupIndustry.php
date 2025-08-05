<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupIndustries\Pages;

use App\Filament\Resources\StartupIndustries\StartupIndustryResource;
use Filament\Resources\Pages\EditRecord;

final class EditStartupIndustry extends EditRecord
{
    protected static string $resource = StartupIndustryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
