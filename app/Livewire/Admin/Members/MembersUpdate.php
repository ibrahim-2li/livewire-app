<?php

namespace App\Livewire\Admin\Members;

use App\Models\Member;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Members\MembersData;

class MembersUpdate extends Component
{
    use WithFileUploads;
    public $member, $name, $position, $image, $facebook, $twitter, $linkedin, $instagram;


    protected $listeners = ['membersUpdate'];

    public function membersUpdate($id)
    {
        $this->member = Member::find($id);

        $this->name = $this->member->name;
        $this->position = $this->member->position;
        $this->facebook = $this->member->facebook;
        $this->twitter = $this->member->twitter;
        $this->linkedin = $this->member->linkedin;
        $this->instagram = $this->member->instagram;
        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

    public function rules ()
    {
        return [
            'name' => 'required',
            'position' => 'required',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'linkedin' => 'nullable',
            'instagram' => 'nullable',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        if($this->image){
            unlink($this->member->image);
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images',$imageName, 'public');
            //save data in db
            $data['image'] = 'storage/images/' . $imageName;
        } else {
            unset($data['image']);
        }
        $this->member->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(MembersData::class);
    }
    public function render()
    {
        return view('admin.members.members-update');
    }
}
