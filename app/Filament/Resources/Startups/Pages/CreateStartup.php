<?php

declare(strict_types=1);

namespace App\Filament\Resources\Startups\Pages;

use App\Filament\Resources\Startups\StartupResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateStartup extends CreateRecord
{
    protected static string $resource = StartupResource::class;
}
