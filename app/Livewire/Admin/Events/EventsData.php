<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsData extends Component
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
        return view('admin.events.events-data',
        ['data'=>Event::where('title','like','%'. $this->serarch .'%')->paginate(10)]);
    }
}
