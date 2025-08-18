<?php

namespace Modules\AtencionCiudadano\app\Providers;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use PanicDevs\Modulite\Attributes\FilamentPanel;

#[FilamentPanel]
class DashboardPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('atencionCiudadano')
            ->path('atencion-ciudadano')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: module_path('AtencionCiudadano', 'Filament/Dashboard/Resources'), for: 'Modules\\AtencionCiudadano\\Filament\\Dashboard\\Resources')
            ->discoverPages(in: module_path('AtencionCiudadano', 'Filament/Dashboard/Pages'), for: 'Modules\\AtencionCiudadano\\Filament\\Dashboard\\Pages')
            ->discoverWidgets(in: module_path('AtencionCiudadano', 'Filament/Dashboard/Widgets'), for: 'Modules\\AtencionCiudadano\\Filament\\Dashboard\\Widgets')
            ->pages([
                Dashboard::class,
            ])
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
