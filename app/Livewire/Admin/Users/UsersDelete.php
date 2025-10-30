<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Livewire\Admin\Users\UsersData;
use App\Models\Admin;

class UsersDelete extends Component
{
    public $users;
    protected $listeners = ['usersDelete'];

    public function usersDelete($id)
    {
        $this->users = Admin::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $this->users->delete('users');
        // $this->reset('users');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(UsersData::class);
    }
    public function render()
    {
        return view('admin.users.users-delete');
    }
}
