<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Admin\Categories\CategoriesData;

class CategoriesDelete extends Component
{
    public $categories;
    protected $listeners = ['categoriesDelete'];

    public function categoriesDelete($id)
    {
        $this->categories = Category::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $this->categories->delete('categories');
        // $this->reset('categories');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.categories.categories-delete');
    }
}
