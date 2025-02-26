<?php

namespace App\Livewire\Admin\Subscribers;

use Livewire\Component;
use App\Models\Subscribe;
use App\Livewire\Admin\Subscribers\SubscribersData;

class SubscribersDelete extends Component
{
    public $subscribers;
    protected $listeners = ['subscribersDelete'];

    public function subscribersDelete($id)
    {
        $this->subscribers = Subscribe::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $this->subscribers->delete('subscribers');
        // $this->reset('skill');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(SubscribersData::class);
    }
    public function render()
    {
        return view('admin.subscribers.subscribers-delete');
    }
}
