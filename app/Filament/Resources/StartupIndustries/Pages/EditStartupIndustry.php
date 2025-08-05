<?php

declare(strict_types=1);

namespace App\Filament\Resources\StartupIndustries\Pages;

use App\Filament\Resources\StartupIndustries\StartupIndustryResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditStartupIndustry extends EditRecord
{
    protected static string $resource = StartupIndustryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
