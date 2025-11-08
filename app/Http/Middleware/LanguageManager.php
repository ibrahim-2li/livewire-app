<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageManager
{
    public function handle(Request $request, Closure $next)
    {
        $locale = session('locale');
        if (!$locale) {
            $locale = $request->cookie('locale');
        }
        if ($locale) {
            App::setLocale($locale);
        }

        return $next($request);
    }
}
