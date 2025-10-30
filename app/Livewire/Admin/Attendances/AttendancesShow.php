<?php

namespace App\Livewire\Admin\Attendances;

use Livewire\Component;
use App\Models\Attendance;

class AttendancesShow extends Component
{
    public $attendances, $attendee_name, $attendee_email, $event_id, $qr_token, $used_at, $checked_in_by;
    protected $listeners = ['attendancesShow'];

    public function attendancesShow($id)
    {
        $record = Attendance::find($id);

        $this->attendee_name = $record->attendee_name;
        $this->attendee_email = $record->attendee_email;
        $this->event_id = $record->event_id;
        $this->qr_token = $record->qr_token;
        $this->used_at = $record->used_at;
        $this->checked_in_by = $record->checked_in_by;

        $this->dispatch('showModalToggle');
    }
    public function render()
    {
        return view('admin.attendances.attendances-show');
    }
}
