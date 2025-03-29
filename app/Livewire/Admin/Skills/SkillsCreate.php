<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;
use App\Livewire\Admin\Skills\SkillsData;

class SkillsCreate extends Component
{
    public $name, $color, $progress;

    public function rules ()
    {
        return [
            'name' => 'required',
            'color' => 'nullable',
            'progress' => 'required|numeric',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        Skill::create($data);
        $this->reset(['name','color','progress']);
        $this->dispatch('createModalToggle');
        $this->dispatch('refreshData')->to(SkillsData::class);
    }
    public function render()
    {
        return view('admin.skills.skills-create');
    }
}
