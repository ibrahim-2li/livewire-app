<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function swap($locale)
    {
        $available = config('app.available_locales', ['en', 'ar']);
        
        \Illuminate\Support\Facades\Log::info('Language swap requested', ['locale' => $locale, 'available' => $available]);

        if (in_array($locale, $available, true)) {
            session()->put('locale', $locale);
            session()->save();
            App::setLocale($locale);
            
            \Illuminate\Support\Facades\Log::info('Language swapped successfully', ['new_locale' => $locale, 'session_locale' => session('locale')]);

            return redirect()->back()->withCookie(cookie('locale', $locale, 60 * 24 * 365));
        }
        
        \Illuminate\Support\Facades\Log::warning('Language swap failed: Invalid locale', ['locale' => $locale]);

        return redirect()->back();
    }
}
