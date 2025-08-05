<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupProductTypes\Pages;

use App\Filament\Resources\StartupProductTypes\StartupProductTypeResource;
use Filament\Resources\Pages\EditRecord;

final class EditStartupProductType extends EditRecord
{
    protected static string $resource = StartupProductTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }
}
