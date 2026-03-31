<?php

namespace App\Providers;

use App\Models\BusinessSettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Livewire\Blaze\Blaze;

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
        Blaze::optimize()->in(resource_path('views/components'));

        App::setLocale(Session::get('locale', config('app.locale', 'en')));

        View::composer('*', function ($view) {
            if (!$view->offsetExists('currencySymbol')) {
                $settings = BusinessSettings::current();
                $code = $settings->default_currency ?? 'EUR';
                $view->with('currencyCode', $code);
                $view->with('currencySymbol', BusinessSettings::CURRENCIES[$code] ?? $code);
                $view->with('billingToolUrl', $settings->billing_tool_url);
            }
        });
    }
}
