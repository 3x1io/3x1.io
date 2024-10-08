<?php

namespace App\Providers\Filament;

use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
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
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use TomatoPHP\FilamentAccounts\FilamentAccountsPlugin;
use TomatoPHP\FilamentAlerts\FilamentAlertsPlugin;
use TomatoPHP\FilamentCms\FilamentCMSPlugin;
use TomatoPHP\FilamentInvoices\FilamentInvoicesPlugin;
use TomatoPHP\FilamentMenus\FilamentMenusPlugin;
use TomatoPHP\FilamentNotes\FilamentNotesPlugin;
use TomatoPHP\FilamentPlugins\FilamentPluginsPlugin;
use TomatoPHP\FilamentPWA\FilamentPWAPlugin;
use TomatoPHP\FilamentSettingsHub\FilamentSettingsHubPlugin;
use TomatoPHP\FilamentTranslations\FilamentTranslationsPlugin;
use TomatoPHP\FilamentTranslations\FilamentTranslationsSwitcherPlugin;
use TomatoPHP\FilamentTypes\FilamentTypesPlugin;
use TomatoPHP\FilamentUsers\FilamentUsersPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('3x1')
            ->brandLogo(url('3x1.png'))
            ->font(
                'IBM Plex Sans Arabic',
                provider: GoogleFontProvider::class,
            )
            ->colors([
                'danger' => Color::Red,
                'gray' => Color::Slate,
                'info' => Color::Blue,
                'primary' => Color::Purple,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
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
            ])
            ->plugin(
                FilamentAccountsPlugin::make()
                    ->useTypes()
                    ->canLogin()
                    ->canBlocked()
                    ->useAccountMeta()
                    ->showTypeField()
                    ->useContactUs()
                    ->useLoginBy()
                    ->useAvatar(),
            )
            ->plugin(
                FilamentCMSPlugin::make()
                    ->allowYoutubeImport()
                    ->allowBehanceImport()
                    ->usePageBuilder()
                    ->useThemeManager()
                    ->useFormBuilder(),
            )
            ->plugin(
                FilamentAlertsPlugin::make()
                    ->useSettingsHub(),
            )
            ->plugin(
                FilamentNotesPlugin::make()
                    ->useNotification()
                    ->useGroups()
                    ->useShareLink()
                    ->useCheckList()
                    ->useUserAccess()
            )
            ->plugins([
                FilamentUsersPlugin::make(),
                FilamentTranslationsSwitcherPlugin::make(),
                FilamentMenusPlugin::make(),
                FilamentSettingsHubPlugin::make(),
                FilamentPWAPlugin::make(),
                FilamentInvoicesPlugin::make(),
            ]);
    }
}
