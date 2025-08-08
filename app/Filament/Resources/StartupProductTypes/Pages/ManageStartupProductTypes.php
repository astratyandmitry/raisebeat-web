<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupProductTypes\Pages;

use App\Filament\Resources\StartupProductTypes\StartupProductTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

final class ManageStartupProductTypes extends ManageRecords
{
    protected static string $resource = StartupProductTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create'),
        ];
    }
}
