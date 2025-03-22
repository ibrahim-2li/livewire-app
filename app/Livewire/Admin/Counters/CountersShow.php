<?php

namespace App\Livewire\Admin\Counters;

use App\Models\Counter;
use Livewire\Component;

class CountersShow extends Component
{
    public $counters, $name ,$count, $icon;
    protected $listeners = ['countersShow'];

    public function countersShow($id)
    {
        $record = Counter::find($id);

        $this->name = $record->name;
        $this->count = $record->count;
        $this->icon = $record->icon;


        $this->dispatch('showModalToggle');
    }

    public function render()
    {
        return view('admin.counters.counters-show');
    }
}
