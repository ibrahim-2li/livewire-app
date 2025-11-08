<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function swap($locale)
    {
        $available = config('app.available_locales');
        if (!is_array($available) || empty($available)) {
            $available = ['en', 'ar'];
        }

        if (in_array($locale, $available, true)) {
            session()->put('locale', $locale);
            App::setLocale($locale);
            cookie()->queue(cookie('locale', $locale, 60 * 24 * 365));
        }

        return redirect()->back();
    }
}
