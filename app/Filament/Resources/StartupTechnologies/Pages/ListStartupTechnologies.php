<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupTechnologies\Pages;

use App\Filament\Resources\StartupTechnologies\StartupTechnologyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListStartupTechnologies extends ListRecords
{
    protected static string $resource = StartupTechnologyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create'),
        ];
    }
}
