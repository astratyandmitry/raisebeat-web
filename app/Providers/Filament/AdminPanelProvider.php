<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Livewire\Notifications;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\VerticalAlignment;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

final class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        Notifications::alignment(Alignment::End);
        Notifications::verticalAlignment(VerticalAlignment::End);

        TextColumn::macro('limitedTooltip', function (?int $limit = 40) {
            /** @var TextColumn $this */
            return $this->limit($limit)
                ->tooltip(function (TextColumn $column): ?string {
                    if (strlen((string) $column->getState()) <= $column->getCharacterLimit()) {
                        return null;
                    }

                    return $column->getState();
                });
        });

        return $panel
            ->default()
            ->id('admin')
            ->domain(config('app.admin_domain'))
            ->login()
            ->authGuard('admin')
            ->colors(['primary' => Color::Indigo])
            ->maxContentWidth('full')
            ->navigationGroups([
                NavigationGroup::make()->icon('heroicon-o-document-text')->collapsible()->label('Content'),
                NavigationGroup::make()->icon('heroicon-o-queue-list')->collapsible()->label('Dictionaries'),
                NavigationGroup::make()->icon('heroicon-o-cog-6-tooth')->collapsible()->label('System'),
            ])
            ->profile()
            ->sidebarCollapsibleOnDesktop()
            ->unsavedChangesAlerts()
            ->databaseTransactions()
            ->readOnlyRelationManagersOnResourceViewPagesByDefault(false)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
