<?php

namespace App\Filament\Resources\Admins\Actions;

use Filament\Actions\CreateAction;
use Illuminate\Support\Facades\Hash;

final class CreateAdminAction
{
    public static function make(): CreateAction
    {
        return CreateAction::make()->label('Create')
            ->mutateDataUsing(function (array $data): array {
                if (isset($data['password']) && filled($data['password'])) {
                    $data['password'] = Hash::make($data['password']);
                }

                return $data;
            });
    }
}
