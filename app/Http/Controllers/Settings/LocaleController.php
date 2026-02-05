<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    /**
     * Switch application locale
     */
    public function switch(string $locale): RedirectResponse
    {
        // Allow only supported languages
        $allowed = ['da', 'de', 'en', 'es', 'fr', 'it', 'nl', 'pl', 'pt', 'ro', 'uk'];
        if (!in_array($locale, $allowed, true)) {
            $locale = config('app.locale', 'en');
        }
        
        // Save in session
        session(['locale' => $locale]);
        
        // If user is logged in, save on DB as well
        if (auth()->check()) {
            auth()->user()->update(['preferred_locale' => $locale]);
        }
        
        return back();
    }
}
