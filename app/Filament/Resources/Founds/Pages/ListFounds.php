<?php

namespace App\Filament\Resources\Founds\Pages;

use App\Filament\Resources\Founds\FoundResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFounds extends ListRecords
{
    protected static string $resource = FoundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
