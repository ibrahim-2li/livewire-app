<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;
use App\Livewire\Admin\Skills\SkillsData;

class SkillsCreate extends Component
{
    public $name,$progress;

    public function rules ()
    {
        return [
            'name' => 'required',
            'progress' => 'required|numeric',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        Skill::create($data);
        $this->reset(['name','progress']);
        $this->dispatch('createModalToggle');
        $this->dispatch('refreshData')->to(SkillsData::class);
    }
    public function render()
    {
        return view('admin.skills.skills-create');
    }
}
