<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminLogoutComponent extends Component
{

    public function logout()
    {
        Auth::guard('admin')->logout();

        session()->invalidate();

        session()->regenerateToken();

        return to_route('admin.login');
    }

    public function render()
    {
        return view('admin.auth.admin-logout-component');
    }
}
