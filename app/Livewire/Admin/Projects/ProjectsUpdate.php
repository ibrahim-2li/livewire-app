<?php

namespace App\Livewire\Admin\projects;

use App\Models\Project;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Projects\ProjectsData;

class ProjectsUpdate extends Component
{
    use WithFileUploads;
    public $project, $name, $link, $image, $description, $category_id, $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    protected $listeners = ['projectsUpdate'];

    public function projectsUpdate($id)
    {
        $this->project = Project::find($id);

        $this->name = $this->project->name;
        $this->description = $this->project->description;
        $this->link = $this->project->link;
        $this->category_id = $this->project->category_id;
        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

    public function rules ()
    {
        return [
            'name' => 'required',
            'link' => 'nullable|url',
            'image' => 'nullable',
            'description' => 'required|string',
            'category_id' => 'required',
        ];
    }

    public function attributes ()
    {
        return [
            'category_id' => 'Category',
        ];
    }

    public function submit()
    {
        $data = $this->validate($this->rules(), [], $this->attributes());
        if($this->image){
            unlink($this->project->image);
            $imageName = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('images',$imageName, 'public');
            //save data in db
            $data['image'] = 'storage/images/' . $imageName;
        } else {
            unset($data['image']);
        }
        $this->project->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(ProjectsData::class);
    }
    public function render()
    {
        return view('admin.projects.projects-update');
    }
}
