<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;
use App\Livewire\Admin\Skills\SkillsData;

class SkillsDelete extends Component
{

    public $skill;
    protected $listeners = ['skillDelete'];

    public function skillDelete($id)
    {
        $this->skill = Skill::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $this->skill->delete('skill');
        // $this->reset('skill');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(SkillsData::class);
    }
    public function render()
    {
        return view('admin.skills.skills-delete');
    }
}
