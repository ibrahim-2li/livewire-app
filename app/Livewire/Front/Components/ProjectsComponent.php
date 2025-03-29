<?php

namespace App\Livewire\Front\Components;

use App\Models\Project;
use Livewire\Component;

class ProjectsComponent extends Component
{
    public function render()
    {
        return view('front.components.projects-component',['projects' => Project::take(10)->get()]);
    }
}
