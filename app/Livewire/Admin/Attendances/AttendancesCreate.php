<?php

namespace App\Livewire\Admin\Attendances;

use App\Models\Event;
use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Admin\Attendances\AttendancesData;
use App\Models\Admin;

class AttendancesCreate extends Component
{
    use WithFileUploads;
    public $name, $email, $event_id, $admin_id, $qr_token, $used_at, $checked_in_by, $events, $users, $country;

    public function mount()
    {
        $this->users = Admin::all();
        $this->events = Event::all();
    }

    public function rules ()
    {
        return [
            'country' => 'required',
            'event_id' => 'required',
            'used_at' => 'nullable',
            'admin_id' => 'required',
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
        // $data['admin_id'] = Auth::user()->id;
        $data['qr_token'] = 'attend_' . bin2hex(random_bytes(16));

        Attendance::create($data);
        $this->reset(['name','email','event_id']);
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
