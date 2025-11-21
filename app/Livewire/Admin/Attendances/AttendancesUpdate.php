<?php

namespace App\Livewire\Admin\Attendances;

use App\Models\Event;
use Livewire\Component;
use App\Models\Attendance;
use App\Livewire\Admin\Attendances\AttendancesData;

class AttendancesUpdate extends Component
{

    public $name, $email, $event_id, $events, $attendance, $country;

    protected $listeners = ['attendancesUpdate'];

    public function mount()
    {
        $this->events = Event::all();
    }


    public function attendancesUpdate($id)
    {
        $this->attendance = Attendance::find($id);

        $this->name = $this->attendance->user->name;
        $this->email = $this->attendance->user->email;
        $this->event_id = $this->attendance->event_id;
        $this->country = $this->attendance->country;
        // $this->qr_token = $this->event->qr_token;

        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

    public function rules ()
    {
        return [
            'name' => 'required',
            'email' => 'required',
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
