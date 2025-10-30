<?php

namespace App\Livewire\Admin\Users;

use App\Models\Admin;
use Livewire\Component;

class UsersShow extends Component
{
    public $user, $name, $email, $password, $phone , $job_title, $gender;
    protected $listeners = ['usersShow'];

    public function usersShow($id)
    {
        $this->user = Admin::find($id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->password = $this->user->password;
        $this->phone = $this->user->phone;
        $this->job_title = $this->user->job_title;
        $this->gender = $this->user->gender;
        $this->resetValidation();

        $this->dispatch('showModalToggle');
    }
    public function render()
    {
        return view('admin.users.users-show');
    }
}
