<?php

declare(strict_types=1);

namespace App\Filament\Resources\Founds\Pages;

use App\Filament\Resources\Founds\FoundResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListFounds extends ListRecords
{
    protected static string $resource = FoundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
