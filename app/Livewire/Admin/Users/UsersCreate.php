<?php

namespace App\Livewire\Admin\Users;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Livewire\WithFileUploads;

class UsersCreate extends Component
{
    use WithFileUploads;
    public $name, $email, $password, $phone, $job_title, $gender;

    public function rules ()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'phone' => 'nullable',
            'job_title' => 'nullable',
            'gender' => 'required|in:male,female',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        $data['password'] = Hash::make($this->password);
        // save image on my project
        Admin::create($data);
        $this->reset(['name','email','password','phone','job_title','gender']);
        // hide image
        $this->dispatch('createModalToggle');
        // refresh projects data component
        $this->dispatch('refreshData')->to(UsersData::class);
    }
    public function render()
    {
        return view('admin.users.users-create');
    }
}
