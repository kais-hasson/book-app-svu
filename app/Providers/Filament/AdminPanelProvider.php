<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->login()
            ->resources([
                \App\Filament\Resources\BookResource::class,
                \App\Filament\Resources\CategoryResource::class,
                \App\Filament\Resources\UsersResource::class,
                \App\Filament\Resources\ChnageUereRoleResource::class,
            ])
            ->passwordReset()      // Enables password reset routes (GET + POST)
            ->registration()       // (Optional) Enables user registration
            ->emailVerification()
            ->colors([
                'primary' => [
                    50  => '249, 247, 241',
                    100 => '243, 239, 226',
                    200 => '234, 227, 202',
                    300 => '220, 208, 169',
                    400 => '204, 188, 138',
                    500 => '186, 180, 155', // Original #BAB49B
                    600 => '158, 151, 126',
                    700 => '132, 124, 101',
                    800 => '106, 99, 79',
                    900 => '83, 78, 62',
                    950 => '52, 48, 37',
                ]
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
//                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
