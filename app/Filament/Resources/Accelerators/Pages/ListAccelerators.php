<?php

declare(strict_types=1);

namespace App\Filament\Resources\Accelerators\Pages;

use App\Filament\Resources\Accelerators\AcceleratorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListAccelerators extends ListRecords
{
    protected static string $resource = AcceleratorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
