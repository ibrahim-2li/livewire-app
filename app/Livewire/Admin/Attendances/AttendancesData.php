<?php

namespace App\Livewire\Admin\Attendances;

use Livewire\Component;
use App\Models\Attendance;
use App\Models\Event;
use Livewire\WithPagination;
use App\Http\Filters\AttendanceFilter;
use App\Exports\AttendancesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function getFilteredQueryProperty()
    {
        $request = new Request();
        if (!empty($this->event)) {
            $request->merge(['event' => $this->event]);
        }
        if (!empty($this->country)) {
            $request->merge(['country' => $this->country]);
        }
        $filters = new AttendanceFilter($request);
        $query = Attendance::filter($filters);

        // Apply search filter
        if ($this->serarch) {
            $query->where('attendee_name', 'like', '%' . $this->serarch . '%');
            $query->orWhere('attendee_email', 'like', '%' . $this->serarch . '%');
        }

        return $query;
    }

    public function getDatacountProperty()
    {
        return $this->filteredQuery->count();
    }

    public function getAttendsProperty()
    {
        return $this->filteredQuery;
    }

    public function getDatausedProperty()
    {
        return $this->filteredQuery->whereNotNull('used_at')->count();
    }

    public function export()
    {
        $filename = 'attendances_' . date('Y-m-d_His') . '.xlsx';
        return Excel::download(new AttendancesExport($this->filteredQuery), $filename);
    }

    public function render()
    {
        // Use filtered query which already includes all filters
        $data = $this->filteredQuery->paginate(10);

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
