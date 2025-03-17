<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use App\Livewire\Admin\Services\ServicesData;

class ServicesCreate extends Component
{
    public $name, $description, $icon;

    public function rules ()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ];
    }

    public function submit()
    {
        $data = $this->validate();
        Service::create($data);
        $this->reset(['name','description','icon']);
        $this->dispatch('createModalToggle');
        $this->dispatch('refreshData')->to(ServicesData::class);
    }
    public function render()
    {
        return view('admin.services.services-create');
    }
}
