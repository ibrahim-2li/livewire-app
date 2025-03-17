<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use App\Livewire\Admin\Services\ServicesData;

class ServicesDelete extends Component
{
    public $services;
    protected $listeners = ['servicesDelete'];

    public function servicesDelete($id)
    {
        $this->services = Service::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $this->services->delete('services');
        // $this->reset('services');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(ServicesData::class);
    }
    public function render()
    {
        return view('admin.services.services-delete');
    }
}
