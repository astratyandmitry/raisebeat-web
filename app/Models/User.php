<?php

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\Linkable as LinkableContract;
use App\Models\Enums\Country;
use App\Models\Enums\Language;
use App\Models\Enums\Timezone;
use App\Models\Traits\HasLinks;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;

/**
 * @property-read string $email
 * @property-read string $password
 * @property-read string $remember_token
 * @property-read string $first_name
 * @property-read string $last_name
 * @property-read string $username
 * @property-read string|null $headline
 * @property-read string|null $bio
 * @property-read string|null $avatar_url
 * @property-read string|null $city
 * @property-read bool $is_admin
 * @property-read bool $is_blocked
 * @property-read \App\Models\Enums\Country|null $country
 * @property-read \App\Models\Enums\Timezone $timezone
 * @property-read \App\Models\Enums\Language $language
 * @property-read \Carbon\Carbon $email_verified_at
 *
 * @property-read \App\Models\Investor|null $investor_profile
 */
final class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    LinkableContract
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, HasLinks;

    protected $guarded = ['is_admin', 'is_blocked'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'country' => Country::class,
            'timezone' => Timezone::class,
            'language' => Language::class,
            'is_admin' => 'boolean',
            'is_blocked' => 'boolean',
        ];
    }

    public function investor_profile(): HasOne
    {
        return $this->hasOne(Investor::class);
    }
}
