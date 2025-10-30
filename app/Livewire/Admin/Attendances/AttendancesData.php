<?php

namespace App\Livewire\Admin\Attendances;

use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithPagination;
use App\Http\Filters\AttendanceFilter;
use App\Http\Resources\AttendanceResource;

class AttendancesData extends Component
{
    use WithPagination;

    public $serarch;

    public function updatingSerarch()
    {
        $this->resetPage();
    }

    protected $listeners = ['refreshData','$refresh'];

    public function getDatacountProperty()
    {
        return Attendance::count();
    }

    public function getAttendsProperty(AttendanceFilter $filters)
    {
        return new AttendanceResource(Attendance::filter($filters));
    }

    public function getDatausedProperty()
    {
        return Attendance::whereNotNull('used_at')->count();
    }

    public function render()
    {
        return view('admin.attendances.attendances-data',
        ['data'=>Attendance::where('attendee_name','like','%'. $this->serarch .'%')->paginate(10), 'Attends'=>$this->Attends, 'datacount' => $this->datacount, 'dataused' => $this->Dataused]);
    }
}
