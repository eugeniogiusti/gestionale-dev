<?php

namespace App\Http\Middleware\Localization;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        $availableLocales = [
            'da', 'de', 'en', 'es', 'fr', 'it', 'nl', 'pl', 'pt', 'ro', 'uk',
        ];

        $locale = null;

        // 1. if user is authenticated, use their preferred locale
        if (auth()->check()) {
            $locale = auth()->user()->preferred_locale;
        }

        // 2. Otherwise, check session
        if (!$locale) {
            $locale = session('locale');
        }

        // 3. Fallback to config locale
        if (!$locale) {
            $locale = config('app.locale', 'en');
        }

        if (!$locale || !in_array($locale, $availableLocales, true)) {
            $locale = config('app.locale', 'en');
        }

        App::setLocale($locale);
        
        return $next($request);
    }
}
