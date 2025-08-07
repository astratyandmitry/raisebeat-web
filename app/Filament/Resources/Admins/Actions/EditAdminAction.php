<?php

declare(strict_types=1);

namespace App\Filament\Resources\Admins\Actions;

use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Illuminate\Support\Facades\Hash;

final class EditAdminAction
{
    public static function make(): Action
    {
        return EditAction::make()
            ->mutateDataUsing(function (array $data): array {
                if (isset($data['new_password']) && filled($data['new_password'])) {
                    $data['password'] = Hash::make($data['new_password']);
                }

                unset($data['new_password'], $data['new_password_confirmation']);

                return $data;
            });
    }
}
