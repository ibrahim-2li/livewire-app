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
        return Attendance::where('admin_id', Auth::guard('admin')->user()->id)
            ->whereNull('used_at')
            ->with('event')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getQrcodesUsedProperty()
    {
        return Attendance::where('admin_id', Auth::guard('admin')->user()->id)
            ->whereNotNull('used_at')
            ->with('event')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        $userId = Auth::guard('admin')->user()->id;

        return view('admin.my-attendances.my-attendances-data', [
            'data' => Attendance::where('admin_id', $userId)->paginate(10),
            'qrcodes' => $this->qrcodes,
            'qrcodesUsed' => $this->qrcodesUsed
        ]);
    }
}
