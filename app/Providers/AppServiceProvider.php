<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Abstracts\Model;
use App\Models\Accelerator;
use App\Models\Comment;
use App\Models\Found;
use App\Models\Investor;
use App\Models\Publisher;
use App\Models\Post;
use App\Models\Startup;
use App\Models\StartupVacancy;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->setupCommandsSafely();
        $this->tuneModelBehavior();
        $this->enforceSecureUrls();
        $this->optimizeViteSettings();

        LogViewer::auth(fn (): bool => auth('admin')->check());

        Relation::morphMap([
            'users' => User::class,
            'accelerators' => Accelerator::class,
            'investors' => Investor::class,
            'founds' => Found::class,
            'publishers' => Publisher::class,
            'startups' => Startup::class,
            'startup_vacancies' => StartupVacancy::class,
            'posts' => Post::class,
            'comments' => Comment::class,
        ]);
    }

    /**
     * Prevent destructive commands in production.
     */
    private function setupCommandsSafely(): void
    {
        DB::prohibitDestructiveCommands($this->app->isProduction());
    }

    /**
     * Fine-tune Eloquent model behavior.
     */
    private function tuneModelBehavior(): void
    {
        Model::shouldBeStrict();
        Model::unguard();
    }

    /**
     * Force HTTPS in non-local environments.
     */
    private function enforceSecureUrls(): void
    {
        if (! $this->app->environment('local')) {
            URL::forceScheme('https');
        }
    }

    /**
     * Optimize Vite asset loading strategy.
     */
    private function optimizeViteSettings(): void
    {
        Vite::usePrefetchStrategy('aggressive');
    }
}
