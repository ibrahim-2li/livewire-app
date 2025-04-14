<?php

namespace App\Livewire\Admin\Members;

use App\Models\Member;
use Livewire\Component;
use App\Livewire\Admin\Members\MembersData;

class MembersDelete extends Component
{
    public $members;
    protected $listeners = ['membersDelete'];

    public function membersDelete($id)
    {
        $this->members = Member::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        unlink($this->members->image);
        $this->members->delete('members');
        // $this->reset('members');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(MembersData::class);
    }
    public function render()
    {
        return view('admin.members.members-delete');
    }
}
