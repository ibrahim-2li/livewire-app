<?php

namespace App\Livewire\Admin\Attendances;

use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;

class AttendancesShow extends Component
{
    public $attendances, $name, $email, $country, $phone, $job_title, $event_id, $qr_token, $used_at, $checked_in_by;
    protected $listeners = ['attendancesShow'];

    public function getQrcodesProperty()
    {
        return Attendance::where('admin_id', Auth::guard('admin')->user()->id)
            ->whereNull('used_at')
            ->with('event')
            ->orderBy('created_at', 'desc')
            ->get();
    }



    public function attendancesShow($id)
    {
        $record = Attendance::find($id);

        $this->name = $record->user->name;
        $this->email = $record->user->email;
        $this->country = $record->country;
        $this->phone = $record->user->phone;
        $this->job_title = $record->user->job_title;
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
