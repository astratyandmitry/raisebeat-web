<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\Access\Authorizable;

/**
 * @property string $email
 * @property string $name
 * @property string $password
 * @property string $remember_token
 */
final class Admin extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    FilamentUser
{
    use Authenticatable, Authorizable, CanResetPassword;

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
