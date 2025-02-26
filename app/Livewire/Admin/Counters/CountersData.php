<?php

namespace App\Livewire\Admin\Counters;

use App\Models\Counter;
use Livewire\Component;
use Livewire\WithPagination;

class CountersData extends Component
{
    use WithPagination;

    public $serarch;

    public function updatingSerarch()
    {
        $this->resetPage();
    }
    protected $listeners = ['refreshData','$refresh'];

    public function render()
    {
        return view('admin.counters.counters-data',
        ['data'=>Counter::where('name','like','%'. $this->serarch .'%')->paginate(10)]);
    }
}
