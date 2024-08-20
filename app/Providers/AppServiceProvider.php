<?php

namespace App\Providers;

use App\Models\Account;
use Illuminate\Support\ServiceProvider;
use TomatoPHP\FilamentCms\Facades\FilamentCMS;
use TomatoPHP\FilamentCms\Services\Contracts\CmsType;
use TomatoPHP\FilamentInvoices\Facades\FilamentInvoices;
use TomatoPHP\FilamentInvoices\Services\Contracts\InvoiceFor;
use TomatoPHP\FilamentInvoices\Services\Contracts\InvoiceFrom;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        FilamentCMS::types()->register([
           CmsType::make('skill')
                ->label('Skill')
                ->icon('heroicon-s-sun')
                ->color('danger')
        ]);

        FilamentInvoices::registerFrom([
            InvoiceFrom::make(Account::class)
                ->label('Company')
        ]);

        FilamentInvoices::registerFor([
            InvoiceFor::make(Account::class)
                ->label('Customer')
        ]);
    }
}
