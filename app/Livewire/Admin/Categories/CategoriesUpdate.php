<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use App\Livewire\Admin\Categories\CategoriesData;

class CategoriesUpdate extends Component
{
    public $categories, $name;
    protected $listeners = ['categoriesUpdate'];

    public function categoriesUpdate($id)
    {
        $this->categories = Category::find($id);

        $this->name = $this->categories->name;

        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

    public function rules ()
    {
        return [
            'name' => 'required',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        $this->categories->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(CategoriesData::class);
    }
    public function render()
    {
        return view('admin.categories.categories-update');
    }
}
