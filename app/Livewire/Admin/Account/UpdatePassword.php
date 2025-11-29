<?php

namespace App\Livewire\Admin\Account;

use Livewire\Component;

class UpdatePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;

    public function updatePassword()
    {
        $this->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed', 'different:current_password'],
        ]);

        auth()->user()->update([
            'password' => \Illuminate\Support\Facades\Hash::make($this->password),
        ]);

        session()->flash('success', __('Password updated successfully.'));

        $this->reset();
    }

    public function render()
    {
        return view('admin.account.update-password');
    }
}
