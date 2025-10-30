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
    public $title, $location, $image, $description, $start_date, $end_date, $is_active = 1;


    public function rules ()
    {
        return [
            'title' => 'required',
            'location' => 'nullable',
            // 'image' => 'required',
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
                // save image on my project
        // $imageName = time() . '.' . $this->image->getClientOriginalExtension();
        // $this->image->storeAs('images',$imageName, 'public');
        //save data in db
        // $data['image'] = 'storage/images/' . $imageName;
        Event::create($data);
        $this->reset(['title','description','location','image','start_date','end_date','is_active']);
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
