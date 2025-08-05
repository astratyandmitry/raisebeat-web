<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupProductTypes\Pages;

use App\Filament\Resources\StartupProductTypes\StartupProductTypeResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateStartupProductType extends CreateRecord
{
    protected static string $resource = StartupProductTypeResource::class;
}
