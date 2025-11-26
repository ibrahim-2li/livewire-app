<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageManager
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('locale')) {
            $locale = $request->session()->get('locale');
            \Illuminate\Support\Facades\Log::info('LanguageManager: Setting locale from session', ['locale' => $locale]);
            App::setLocale($locale);
        } elseif ($request->cookie('locale')) {
            $locale = $request->cookie('locale');
            \Illuminate\Support\Facades\Log::info('LanguageManager: Setting locale from cookie', ['locale' => $locale]);
            App::setLocale($locale);
        } else {
             \Illuminate\Support\Facades\Log::info('LanguageManager: No locale found in session or cookie');
        }

        return $next($request);
    }
}
