<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Component;
use App\Livewire\Admin\Projects\ProjectsData;

class ProjectsDelete extends Component
{
    public $projects;
    protected $listeners = ['projectsDelete'];

    public function projectsDelete($id)
    {
        $this->projects = Project::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        unlink($this->projects->image);
        $this->projects->delete('projects');
        // $this->reset('projects');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(ProjectsData::class);
    }
    public function render()
    {
        return view('admin.projects.projects-delete');
    }
}
