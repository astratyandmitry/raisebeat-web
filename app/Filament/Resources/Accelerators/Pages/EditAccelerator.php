<?php

declare(strict_types=1);

namespace App\Filament\Resources\Accelerators\Pages;

use App\Filament\Resources\Accelerators\AcceleratorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

final class EditAccelerator extends EditRecord
{
    protected static string $resource = AcceleratorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
