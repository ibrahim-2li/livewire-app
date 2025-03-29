<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class SkillsUpdate extends Component
{
    public $skill, $name , $color ,$progress;
    protected $listeners = ['skillUpdate'];

    public function skillUpdate($id)
    {
        $this->skill = Skill::find($id);

        $this->name = $this->skill->name;
        $this->color = $this->skill->color;
        $this->progress = $this->skill->progress;
        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

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
        $this->skill->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(SkillsData::class);
    }

    public function render()
    {
        return view('admin.skills.skills-update');
    }
}
