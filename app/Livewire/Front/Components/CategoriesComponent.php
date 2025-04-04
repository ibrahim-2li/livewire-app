<?php

namespace App\Livewire\Front\Components;

use Livewire\Component;
use App\Models\Category;

class CategoriesComponent extends Component
{
    public function render()
    {
        return view('front.components.categories-component', ['categories'=>Category::all()]);
    }
}
