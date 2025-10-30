<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Admin\Events\EventsData;

class EventsCreate extends Component
{
    use WithFileUploads;
    public $title, $location, $map, $description, $start_date, $end_date, $is_active = 1;


    public function rules ()
    {
        return [
            'title' => 'required',
            'location' => 'nullable',
            'map' => 'required|url',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'is_active' => 'required|in:0,1',
            // 'qr_token' => 'required',
        ];
    }


    public function submit()
    {
        $data = $this->validate($this->rules());
        $data['admin_id'] = Auth::user()->id;
        $data['is_active'] = $this->is_active ? 1 : 0;

        Event::create($data);
        $this->reset(['title','description','location','start_date','end_date','is_active','map']);
        // hide image
        $this->dispatch('createModalToggle');
        // refresh projects data component
        $this->dispatch('refreshData')->to(EventsData::class);
    }

    public function render()
    {
        return view('admin.events.events-create');
    }
}
