<?php

namespace App\Livewire\Admin\Members;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Members\MembersData;

class MembersCreate extends Component
{
    use WithFileUploads;
    public $name, $position, $image, $facebook, $twitter, $linkedin, $instagram;

    public function rules ()
    {
        return [
            'name' => 'required',
            'position' => 'required',
            'image' => 'required',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'linkedin' => 'nullable',
            'instagram' => 'nullable',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        // save image on my project
        $imageName = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('images',$imageName, 'public');
        //save data in db
        $data['image'] = 'storage/images/' . $imageName;
        Member::create($data);
        $this->reset(['name','position','image','facebook','twitter','linkedin','instagram']);
        // hide image
        $this->dispatch('createModalToggle');
        // refresh projects data component
        $this->dispatch('refreshData')->to(MembersData::class);
    }
    public function render()
    {
        return view('admin.members.members-create');
    }
}
