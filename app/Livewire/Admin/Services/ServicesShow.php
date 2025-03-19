<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;

class ServicesShow extends Component
{
    public $services, $name ,$description, $icon;
    protected $listeners = ['servicesShow'];

    public function servicesShow($id)
    {
        $record = Service::find($id);

        $this->name = $record->name;
        $this->description = $record->description;
        $this->icon = $record->icon;


        $this->dispatch('showModalToggle');
    }

    public function render()
    {
        return view('admin.services.services-show');
    }
}
