<?php

namespace App\Livewire\Admin\Account;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Http\Request;

class UpdateAccountImage extends Component
{
    public Admin $user;

    public function mount(Request $request)
    {
        $this->user = $request->user();
    }
    public function render()
    {
        return view('admin.account.update-account-image');
    }
}
