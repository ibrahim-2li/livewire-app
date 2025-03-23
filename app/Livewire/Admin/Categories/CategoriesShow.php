<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;

class CategoriesShow extends Component
{
    public $name;
    protected $listeners = ['categoriesShow'];

    public function categoriesShow($id)
    {
        $record = Category::find($id);

        $this->name = $record->name;

        $this->dispatch('showModalToggle');
    }

    public function render()
    {
        return view('admin.categories.categories-show');
    }
}
