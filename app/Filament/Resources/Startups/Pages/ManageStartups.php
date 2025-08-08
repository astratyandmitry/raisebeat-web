<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups\Pages;

use App\Filament\Resources\Startups\StartupResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

final class ManageStartups extends ManageRecords
{
    protected static string $resource = StartupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create'),
        ];
    }
}
