<?php

namespace App\Livewire\Admin\Attendances;

use Livewire\Component;
use App\Livewire\Admin\Attendances\AttendancesData;
use App\Models\Attendance;

class AttendancesDelete extends Component
{
    public $attendances;
    protected $listeners = ['attendancesDelete'];

    public function attendancesDelete($id)
    {
        $this->attendances = Attendance::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        // unlink($this->attendances->image);
        $this->attendances->delete('attendances');
        // $this->reset('projects');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(AttendancesData::class);
    }
    public function render()
    {
        return view('admin.attendances.attendances-delete');
    }
}
