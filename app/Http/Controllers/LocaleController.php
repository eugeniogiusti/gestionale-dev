<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        // allow only supported languages
        if (! in_array($locale, ['it','en'], true)) {
            $locale = config('app.locale', 'it');
        }

        // set the locale in session and application
        session(['locale' => $locale]);
        app()->setLocale($locale);

        // redirect back to the previous page
        return back();
    }
}