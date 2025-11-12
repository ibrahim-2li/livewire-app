<?php

namespace App\Livewire\Admin\Attendances;

use App\Models\Event;
use Livewire\Component;
use App\Models\Attendance;
use App\Livewire\Admin\Attendances\AttendancesData;

class AttendancesUpdate extends Component
{

    public $attendee_name, $attendee_email, $event_id, $events, $attendance, $country;

    protected $listeners = ['attendancesUpdate'];

    public function mount()
    {
        $this->events = Event::all();
    }


    public function attendancesUpdate($id)
    {
        $this->attendance = Attendance::find($id);

        $this->attendee_name = $this->attendance->attendee_name;
        $this->attendee_email = $this->attendance->attendee_email;
        $this->event_id = $this->attendance->event_id;
        $this->country = $this->attendance->country;
        // $this->qr_token = $this->event->qr_token;

        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

    public function rules ()
    {
        return [
            'attendee_name' => 'required',
            'attendee_email' => 'required',
            'event_id' => 'required',
            'country' => 'required',
        ];
    }

    public function attributes ()
    {
        return [
            'event_id' => 'Event',
        ];
    }

    public function submit()
    {
        $data = $this->validate($this->rules(), [],  $this->attributes() );

        $this->attendance->update($data);
        $this->dispatch('editModalToggle');
        $this->dispatch('refreshData')->to(AttendancesData::class);
    }
    public function render()
    {
        $countries = Attendance::whereNotNull('country')
        ->where('country', '!=', '')
        ->distinct()
        ->orderBy('country')
        ->pluck('country');
        return view('admin.attendances.attendances-update', [
            'countries' => $countries
        ]);
    }
}
