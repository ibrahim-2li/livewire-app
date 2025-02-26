<?php

namespace App\Livewire\Admin\Counters;

use App\Models\Counter;
use Livewire\Component;
use App\Livewire\Admin\Counters\CountersData;

class CountersCreate extends Component
{
    public $name, $count, $icon;

    public function rules ()
    {
        return [
            'name' => 'required',
            'count' => 'required|numeric',
            'icon' => 'required',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        Counter::create($data);
        $this->reset(['name','count','icon']);
        $this->dispatch('createModalToggle');
        $this->dispatch('refreshData')->to(CountersData::class);
    }
    public function render()
    {
        return view('admin.counters.counters-create');
    }
}
