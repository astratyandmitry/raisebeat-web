<?php

declare(strict_types=1);

namespace App\Filament\Resources\Admins\Pages;

use App\Filament\Resources\Admins\Actions\CreateAdminAction;
use App\Filament\Resources\Admins\AdminResource;
use Filament\Resources\Pages\ListRecords;

final class ManageAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAdminAction::make(),
        ];
    }
}
