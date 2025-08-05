<?php

declare(strict_types=1);

namespace App\Filament\Resources\Accelerators\Pages;

use App\Filament\Resources\Accelerators\AcceleratorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAccelerator extends CreateRecord
{
    protected static string $resource = AcceleratorResource::class;
}
