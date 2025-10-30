<?php

namespace App\Livewire\Admin\Attendances;

use App\Models\Event;
use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Admin\Attendances\AttendancesData;

class AttendancesCreate extends Component
{
    use WithFileUploads;
    public $attendee_name, $attendee_email, $event_id, $qr_token, $used_at, $checked_in_by, $events;

    public function mount()
    {
        $this->events = Event::all();
    }

    public function rules ()
    {
        return [
            'attendee_name' => 'required',
            'attendee_email' => 'required',
            'event_id' => 'required',
            'used_at' => 'nullable',
            'checked_in_by' => 'nullable',
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
        $data = $this->validate($this->rules());
        $data['admin_id'] = Auth::user()->id;
        $data['qr_token'] = 'attend_' . bin2hex(random_bytes(16));

        Attendance::create($data);
        $this->reset(['attendee_name','attendee_email','event_id']);
        // hide image
        $this->dispatch('createModalToggle');
        // refresh projects data component
        $this->dispatch('refreshData')->to(AttendancesData::class);
    }

    public function render()
    {
        return view('admin.attendances.attendances-create');
    }
}
