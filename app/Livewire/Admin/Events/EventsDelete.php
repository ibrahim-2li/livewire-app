<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Component;
use App\Livewire\Admin\Events\EventsData;

class EventsDelete extends Component
{
    public $events;
    protected $listeners = ['eventsDelete'];

    public function eventsDelete($id)
    {
        $this->events = Event::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        // unlink($this->events->image);
        $this->events->delete('events');
        // $this->reset('projects');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(EventsData::class);
    }
    public function render()
    {
        return view('admin.events.events-delete');
    }
}
