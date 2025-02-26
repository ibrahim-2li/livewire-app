<?php

namespace App\Livewire\Admin\Counters;

use App\Models\Counter;
use Livewire\Component;
use App\Livewire\Admin\Counters\CountersData;

class CountersUpdate extends Component
{
    public $counter, $name ,$count, $icon;
    protected $listeners = ['counterUpdate'];

    public function counterUpdate($id)
    {
        $this->counter = Counter::find($id);

        $this->name = $this->counter->name;
        $this->count = $this->counter->count;
        $this->icon = $this->counter->icon;
        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

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
        $this->counter->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(CountersData::class);
    }

    public function render()
    {
        return view('admin.counters.counters-update');
    }
}
