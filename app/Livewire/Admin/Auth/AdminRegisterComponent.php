<?php

namespace App\Livewire\Admin\Auth;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminRegisterComponent extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $phone;
    public $job_title;
    public $gender;
    public $role;

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'phone' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function submit()
    {
        $this->validate();

        $admin = Admin::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'job_title' => $this->job_title,
            'gender' => $this->gender,
            'role' => Admin::ROLE_USER,
        ]);

        // Auto-login after registration
        Auth::guard('admin')->login($admin);

        return to_route('admin.index');
    }

    public function render()
    {
        return view('admin.auth.admin-register-component');
    }
}
