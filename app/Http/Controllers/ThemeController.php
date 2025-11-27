<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function swap($theme)
    {
        $available = ['light', 'dark'];
        
        if (in_array($theme, $available, true)) {
            session()->put('theme', $theme);
            session()->save();
            
            return redirect()->back()->withCookie(cookie('theme', $theme, 60 * 24 * 365));
        }

        return redirect()->back();
    }
}
