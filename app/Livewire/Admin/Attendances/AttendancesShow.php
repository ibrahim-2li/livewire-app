<?php

namespace App\Livewire\Admin\Attendances;

use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendancesShow extends Component
{
    public $attendances, $name, $email, $country, $phone, $job_title, $event_id, $qr_token, $used_at, $checked_in_by, $gender, $avatar, $attendance_id, $user_id;
    protected $listeners = ['attendancesShow'];

    public function getQrcodesProperty()
    {
        $userId = $this->user_id ?? Auth::guard('admin')->user()->id;

        $query = Attendance::where('admin_id', $userId)
            ->whereNull('used_at')
            ->with('event')
            ->orderBy('created_at', 'desc');

        if ($this->event_id) {
            $query->where('event_id', $this->event_id);
        }

        return $query->get();
    }



    public function attendancesShow($id)
    {
        $record = Attendance::find($id);

        $this->attendance_id = $record->id;
        $this->user_id = $record->user->id;
        $this->name = $record->user->name;
        $this->email = $record->user->email;
        $this->country = $record->country;
        $this->phone = $record->user->phone;
        $this->job_title = $record->user->job_title;
        $this->gender = $record->user->gender;
        $this->avatar = $record->user->avatar; // Accessor in model handles default
        $this->event_id = $record->event_id;
        $this->qr_token = $record->qr_token;
        $this->used_at = $record->used_at;
        $this->checked_in_by = $record->checked_in_by;

        $this->dispatch('showModalToggle');
    }
    public function render()
    {
        return view('admin.attendances.attendances-show', [
            'qrcodes' => $this->qrcodes
        ]);
    }
}
