<?php

namespace App\Livewire\Admin\Counters;

use App\Models\Counter;
use Livewire\Component;
use App\Livewire\Admin\Counters\CountersData;

class CountersDelete extends Component
{
    public $counter;
    protected $listeners = ['counterDelete'];

    public function counterDelete($id)
    {
        $this->counter = Counter::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $this->counter->delete('counter');
        // $this->reset('counter');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(CountersData::class);
    }
    public function render()
    {
        return view('admin.counters.counters-delete');
    }
}
