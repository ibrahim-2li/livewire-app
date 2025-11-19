<?php

namespace App\Livewire\Admin\Events;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Events\EventsData;

class EventsUpdate extends Component
{
    use WithFileUploads;
    public $event, $title, $location, $image, $map,  $description,$start_date,$end_date,$is_active ,$limits;


    protected $listeners = ['eventsUpdate'];

    public function eventsUpdate($id)
    {
        $this->event = Event::find($id);

        $this->title = $this->event->title;
        $this->description = $this->event->description;
        $this->location = $this->event->location;
        $this->map = $this->event->map;
        $this->limits = $this->event->limits;
        $this->start_date = $this->event->start_date;
        $this->end_date = $this->event->end_date;
        $this->is_active = $this->event->is_active;
        // $this->qr_token = $this->event->qr_token;

        $this->resetValidation();

        $this->dispatch('editModalToggle');
    }

    public function rules ()
    {
        return [
            'title' => 'required',
            'location' => 'nullable',
            'image' => 'nullable',
            'map' => 'required|url',
            'description' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required',
            'limits'    => 'required|integer|min:1'
            // 'is_active' => 'required',
            // 'qr_token' => 'required',
        ];
    }


    public function submit()
{
    $data = $this->validate($this->rules());

    // Convert boolean to integer explicitly
    $data['is_active'] = $this->is_active ? 1 : 0;

    $this->event->update($data);
    $this->dispatch('editModalToggle');
    $this->dispatch('refreshData')->to(EventsData::class);
}
    public function render()
    {
        return view('admin.events.events-update');
    }
}
