<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupIndustries\Pages;

use App\Filament\Resources\StartupIndustries\StartupIndustryResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

final class ViewStartupIndustry extends ViewRecord
{
    protected static string $resource = StartupIndustryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
