<?php

namespace App\Filament\Resources\StartupIndustries\Pages;

use App\Filament\Resources\StartupIndustries\StartupIndustryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStartupIndustries extends ListRecords
{
    protected static string $resource = StartupIndustryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
