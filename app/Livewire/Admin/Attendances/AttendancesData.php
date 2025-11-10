<?php

namespace App\Livewire\Admin\Attendances;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\Event;
use Livewire\WithPagination;
use App\Http\Filters\AttendanceFilter;
use Illuminate\Http\Request;

class AttendancesData extends Component
{
    use WithPagination;

    public $serarch;
    public $event;
    public $country;

    public function updatingSerarch()
    {
        $this->resetPage();
    }

    public function updatingEvent()
    {
        $this->resetPage();
    }

    public function updatingCountry()
    {
        $this->resetPage();
    }

    protected $listeners = ['refreshData','$refresh'];

    public function getDatacountProperty()
    {
        return Attendance::count();
    }

    public function getAttendsProperty()
    {
        $request = new Request();
        if (!empty($this->event)) {
            $request->merge(['event' => $this->event]);
        }
        if (!empty($this->country)) {
            $request->merge(['country' => $this->country]);
        }
        $filters = new AttendanceFilter($request);
        return Attendance::filter($filters);
    }

    public function getDatausedProperty()
    {
        return Attendance::whereNotNull('event_id')->count();
    }

    public function render()
    {
        // Start with base query or filtered query using getAttendsProperty
        $query = (!empty($this->event) || !empty($this->country)) ? $this->Attends : Attendance::query();

        // Apply search filter
        if ($this->serarch) {
            $query->where('attendee_name', 'like', '%' . $this->serarch . '%');
        }

        $data = $query->paginate(10);

        // Get distinct countries for dropdown
        $countries = Attendance::whereNotNull('country')
            ->where('country', '!=', '')
            ->distinct()
            ->orderBy('country')
            ->pluck('country');

        return view('admin.attendances.attendances-data', [
            'data' => $data,
            'Attends' => $this->Attends,
            'datacount' => $this->datacount,
            'dataused' => $this->Dataused,
            'events' => Event::all(),
            'countries' => $countries
        ]);
    }
}
