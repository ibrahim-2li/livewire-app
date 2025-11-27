<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Set locale from session or cookie on every request
        $locale = null;
        
        if (Session::has('locale')) {
            $locale = Session::get('locale');
            \Illuminate\Support\Facades\Log::info('LocaleServiceProvider: Found locale in session', ['locale' => $locale]);
        } elseif (request()->hasCookie('locale')) {
            $locale = request()->cookie('locale');
            \Illuminate\Support\Facades\Log::info('LocaleServiceProvider: Found locale in cookie', ['locale' => $locale]);
            // Also set in session for consistency
            Session::put('locale', $locale);
        }
        
        // Validate locale before setting
        $availableLocales = config('app.available_locales', ['en', 'ar']);
        
        if ($locale && in_array($locale, $availableLocales, true)) {
            \Illuminate\Support\Facades\Log::info('LocaleServiceProvider: Setting locale', ['locale' => $locale]);
            App::setLocale($locale);
        } else {
            \Illuminate\Support\Facades\Log::info('LocaleServiceProvider: Using default locale', ['default' => config('app.locale')]);
        }
        
        // Set theme from session or cookie
        $theme = null;
        
        if (Session::has('theme')) {
            $theme = Session::get('theme');
        } elseif (request()->hasCookie('theme')) {
            $theme = request()->cookie('theme');
            Session::put('theme', $theme);
        }
        
        // Default to light theme if not set
        if (!$theme || !in_array($theme, ['light', 'dark'], true)) {
            $theme = 'light';
        }
        
        // Share theme with all views
        view()->share('currentTheme', $theme);
    }
}
