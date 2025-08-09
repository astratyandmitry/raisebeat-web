<?php

namespace App\Filament\Resources\StartupMetrics\Pages;

use App\Filament\Resources\StartupMetrics\StartupMetricResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

final class ManageStartupMetrics extends ManageRecords
{
    protected static string $resource = StartupMetricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create'),
        ];
    }
}
