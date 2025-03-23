<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Admin\Categories\CategoriesData;

class CategoriesCreate extends Component
{
    public $name;

    public function rules ()
    {
        return [
            'name' => 'required'
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        Category::create($data);
        $this->reset(['name']);
        $this->dispatch('createModalToggle');
        $this->dispatch('refreshData')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.categories.categories-create');
    }
}
