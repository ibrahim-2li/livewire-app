<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class SkillsShow extends Component
{
    public $name ,$progress;
    protected $listeners = ['skillShow'];

    public function skillShow($id)
    {
        $record = Skill::find($id);

        $this->name = $record->name;
        $this->progress = $record->progress;


        $this->dispatch('showModalToggle');
    }

    public function render()
    {
        return view('admin.skills.skills-show');
    }
}
