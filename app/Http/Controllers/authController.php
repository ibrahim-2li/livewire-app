<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class authController extends Controller
{
    public function register()
    {
        return view('admin.auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'phone' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'phone' => $validated['phone'],
            'job_title' => $validated['job_title'],
            'gender' => $validated['gender'],
            'role' => Admin::ROLE_USER,
        ]);

        // Auto-login after registration
        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.index');
    }
}
