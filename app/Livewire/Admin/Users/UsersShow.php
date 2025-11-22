<?php

namespace App\Livewire\Admin\Users;

use App\Models\Admin;
use Livewire\Component;

class UsersShow extends Component
{
    public $user,$user_id, $name, $email, $phone , $job_title, $gender, $nationality,$role;
    protected $listeners = ['usersShow'];

    public function usersShow($id)
    {
        $this->user_id = $id;
        $this->user = Admin::find($id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->job_title = $this->user->job_title;
        $this->gender = $this->user->gender;
        $this->nationality = $this->user->nationality;
        $this->role = $this->user->role;
        $this->resetValidation();

        $this->dispatch('showModalToggle');
    }
    public function render()
    {
        return view('admin.users.users-show', [
            'user' => $this->user,
        ]);
    }
}
