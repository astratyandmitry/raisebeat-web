<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Pages;

use App\Filament\Resources\Founds\FoundResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

final class EditFound extends EditRecord
{
    protected static string $resource = FoundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
