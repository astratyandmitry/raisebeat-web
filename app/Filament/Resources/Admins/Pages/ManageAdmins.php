<?php

declare(strict_types=1);

namespace App\Filament\Resources\Admins\Pages;

use App\Filament\Resources\Admins\AdminResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Hash;

final class ManageAdmins extends ListRecords
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('Create')
                ->mutateDataUsing(function (array $data): array {
                    if (isset($data['password']) && filled($data['password'])) {
                        $data['password'] = Hash::make($data['password']);
                    }

                    return $data;
                }),
        ];
    }
}
