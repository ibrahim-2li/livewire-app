<?php

namespace App\Livewire\Admin\Members;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class MembersData extends Component
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
        return view('admin.members.members-data',
        ['data'=>Member::where('name','like','%'. $this->serarch .'%')->paginate(10)]);
    }
}
