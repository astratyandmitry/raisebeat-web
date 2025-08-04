<?php

namespace App\Filament\Resources\StartupProductTypes\Pages;

use App\Filament\Resources\StartupProductTypes\StartupProductTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStartupProductType extends EditRecord
{
    protected static string $resource = StartupProductTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
