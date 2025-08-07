<?php

declare(strict_types=1);

namespace App\Providers;

use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

final class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        // Horizon::routeMailNotificationsTo('example@example.com');
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');
    }

    protected function authorization(): void
    {
        Horizon::auth(function ($request): bool {
            if (app()->environment('local')) {
                return true;
            }
            return auth('admin')->check();
        });
    }
}
