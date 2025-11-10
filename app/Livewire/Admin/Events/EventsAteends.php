<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Component;

class EventsAteends extends Component
{
    public $attendee_name, $attendee_email, $event_id, $event_title, $qr_token, $used_at, $checked_in_by;
    public $attendances = [];


    protected $listeners = ['eventsAttends'];

    public function eventsAttends($id)
    {
        $event = Event::with('attendances')->find($id);

        $this->attendances = $event->attendances;

        // $record = Attendance::find($id);

        $this->attendee_name = $event->attendee_name;
        $this->attendee_email = $event->attendee_email;
        $this->event_id = $event->id;
        $this->event_title = $event->title;
        $this->qr_token = $event->qr_token;
        $this->used_at = $event->used_at;
        $this->checked_in_by = $event->checked_in_by;



        $this->resetValidation();

        $this->dispatch('showModalToggle');
    }

    public function render()
    {
        return view('admin.events.events-ateends');
    }

}
