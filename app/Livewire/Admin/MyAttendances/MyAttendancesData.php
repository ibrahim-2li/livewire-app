<?php

namespace App\Livewire\Admin\MyAttendances;

use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class MyAttendancesData extends Component
{
    use WithPagination;

    protected $listeners = ['refreshData','$refresh'];

    public function getQrcodesProperty()
    {
        return Attendance::where('attendee_email', Auth::guard('admin')->user()->email)
            ->whereNull('used_at')
            ->with('event')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getQrcodesUsedProperty()
    {
        return Attendance::where('attendee_email', Auth::guard('admin')->user()->email)
            ->whereNotNull('used_at')
            ->with('event')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        $userEmail = Auth::guard('admin')->user()->email;

        return view('admin.my-attendances.my-attendances-data', [
            'data' => Attendance::where('attendee_email', $userEmail)->paginate(10),
            'qrcodes' => $this->qrcodes,
            'qrcodesUsed' => $this->qrcodesUsed
        ]);
    }
}
