<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Pages;

use App\Filament\Resources\Founds\FoundResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFound extends CreateRecord
{
    protected static string $resource = FoundResource::class;
}
