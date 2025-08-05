<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Abstracts\Model;
use App\Models\Contracts\CanPerformActivity;
use App\Models\Contracts\CanReceiveActivity;
use App\Models\Contracts\Followable;
use App\Models\Contracts\Linkable;
use App\Models\Enums\Country;
use App\Models\Enums\Language;
use App\Models\Enums\Timezone;
use App\Models\Traits\HasFollowers;
use App\Models\Traits\HasLinks;
use App\Models\Traits\HasPerformedActivities;
use App\Models\Traits\HasReceivedActivities;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
 * @property-read Investor|null $investor_profile
 * @property-read \App\Models\Follow[]|\Illuminate\Database\Eloquent\Collection $followings
 * @property-read \App\Models\Notification[]|\Illuminate\Database\Eloquent\Collection $notifications
 * @property-read \App\Models\Interaction[]|\Illuminate\Database\Eloquent\Collection $interactions
 * @property-read \App\Models\Member[]|\Illuminate\Database\Eloquent\Collection $memberships
 * @property-read \App\Models\Post[]|\Illuminate\Database\Eloquent\Collection $posts
 */
final class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    CanPerformActivity,
    CanReceiveActivity,
    Linkable,
    Followable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail, HasPerformedActivities, HasReceivedActivities, HasLinks, HasFollowers;

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

    public function followings(): HasMany
    {
        return $this->hasMany(Follow::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function interactions(): HasMany
    {
        return $this->hasMany(Interaction::class);
    }

    public function memberships(): HasMany
    {
        return $this->hasMany(Member::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function performer_user_id(): int
    {
        return $this->id;
    }
}
