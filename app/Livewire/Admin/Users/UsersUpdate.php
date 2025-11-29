<?php

namespace App\Livewire\Admin\Users;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UsersUpdate extends Component
{
    public $user, $name, $email, $password, $role, $phone , $job_title, $gender;
    protected $listeners = ['usersUpdate'];

    public function usersUpdate($id)
    {
        $this->user = Admin::find($id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
        $this->role = $this->user->role;
        $this->phone = $this->user->phone;
        $this->job_title = $this->user->job_title;
        $this->gender = $this->user->gender;
        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

    public function rules ()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $this->user->id,
            'role' => 'required|in:USER,ADMIN,SCANNER,SUPERVISOR',
            'phone' => 'nullable',
            'job_title' => 'nullable',
            'gender' => 'required|in:male,female',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // if($this->password){
        //     $data['password'] = Hash::make($this->password);
        // }
        $this->user->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(UsersData::class);
    }

    public function render()
    {
        return view('admin.users.users-update');
    }
}
