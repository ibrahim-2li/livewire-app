<?php

namespace App\Livewire\Admin\Members;

use App\Models\Member;
use Livewire\Component;

class MembersShow extends Component
{
    public $member, $name, $position, $image, $facebook, $twitter, $linkedin, $instagram;
    protected $listeners = ['membersShow'];

    public function membersShow($id)
    {
        $record = Member::find($id);
        $this->name =$record->name;
        $this->position = $record->position;
        $this->image = $record->image;
        $this->facebook = $record->facebook;
        $this->twitter = $record->twitter;
        $this->linkedin = $record->linkedin;
        $this->instagram = $record->instagram;


        $this->dispatch('showModalToggle');
    }
    public function render()
    {
        return view('admin.members.members-show');
    }
}
