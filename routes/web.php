<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', fn() => Inertia::render('Welcome'))->name('home');

Route::get('dashboard', fn() => Inertia::render('Dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/linkedin/redirect', function () {
    return Socialite::driver('linkedin-openid')->redirect();
});

Route::get('/auth/linkedin/callback', function () {
    $user = Socialite::driver('linkedin-openid')->user();
dd($user);
/**
 * Laravel\Socialite\Two\User {#3049 ▼ // routes/web.php:19
 * +id: "c33GRkVkCu"
 * +nickname: null
 * +name: "Dmitry Astratyan"
 * +email: "astratyandmitry@gmail.com"
 * +avatar: "https://media.licdn.com/dms/image/v2/D4E03AQEpYzmSG3RVKg/profile-displayphoto-shrink_200_200/B4EZd4gkYIGcAY-/0/1750073493738?e=1756944000&v=beta&t=3T-_r83SCCx5k ▶"
 * +user: array:7 [▼
     * "sub" => "c33GRkVkCu"
     * "email_verified" => true
     * "given_name" => "Dmitry"
     * "picture" => "https://media.licdn.com/dms/image/v2/D4E03AQEpYzmSG3RVKg/profile-displayphoto-shrink_200_200/B4EZd4gkYIGcAY-/0/1750073493738?e=1756944000&v=beta&t=3T-_r83SCCx5k ▶"
     * "name" => "Dmitry Astratyan"
     * "family_name" => "Astratyan"
     * "email" => "astratyandmitry@gmail.com"
 * ]
 * +attributes: array:9 [▼
     * "id" => "c33GRkVkCu"
     * "nickname" => null
     * "name" => "Dmitry Astratyan"
     * "first_name" => "Dmitry"
     * "last_name" => "Astratyan"
     * "email" => "astratyandmitry@gmail.com"
     * "email_verified" => true
     * "avatar" => "https://media.licdn.com/dms/image/v2/D4E03AQEpYzmSG3RVKg/profile-displayphoto-shrink_200_200/B4EZd4gkYIGcAY-/0/1750073493738?e=1756944000&v=beta&t=3T-_r83SCCx5k ▶"
     * "avatar_original" => "https://media.licdn.com/dms/image/v2/D4E03AQEpYzmSG3RVKg/profile-displayphoto-shrink_200_200/B4EZd4gkYIGcAY-/0/1750073493738?e=1756944000&v=beta&t=3T-_r83SCCx5k ▶"
 * ]
 * +token: "AQVv0_074DUFyX19YEz4AxAmHTyYY0Uq-vENi1LETCW6RFH2YxlLsYTw8WoaY9ex6tsGloBqXCkrtPtq1G0o_wqG66bu9n9h9y9k77q04maIfQyb2Fo0Pnm7YXUDup7YcX4fuxhvYNF4-A9MxRkQxQV_qGD0N-Nq ▶"
 * +refreshToken: null
 * +expiresIn: 5183999
 * +approvedScopes: array:1 [▼
     * 0 => "email,openid,profile"
 * ]
 * }
 */
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
