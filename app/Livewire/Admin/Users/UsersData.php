<?php

namespace App\Livewire\Admin\Users;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithPagination;

class UsersData extends Component
{
    use WithPagination;

    public $serarch;

    public function updatingSerarch()
    {
        $this->resetPage();
    }
    protected $listeners = ['refreshData','$refresh'];

    public function render()
    {
        return view('admin.users.users-data',
        ['data'=>Admin::where('name','like','%'. $this->serarch .'%')->orWhere('email','like','%'. $this->serarch .'%')->paginate(10)]);
    }
}
