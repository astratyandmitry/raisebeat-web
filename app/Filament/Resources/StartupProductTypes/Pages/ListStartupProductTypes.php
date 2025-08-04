<?php

namespace App\Filament\Resources\StartupProductTypes\Pages;

use App\Filament\Resources\StartupProductTypes\StartupProductTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListStartupProductTypes extends ListRecords
{
    protected static string $resource = StartupProductTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
