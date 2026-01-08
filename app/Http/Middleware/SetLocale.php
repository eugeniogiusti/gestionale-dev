<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
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
            $locale = config('app.locale', 'it');
        }

        App::setLocale($locale);
        
        return $next($request);
    }
}