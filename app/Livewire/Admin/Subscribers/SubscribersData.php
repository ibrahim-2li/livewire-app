<?php

namespace App\Livewire\Admin\Subscribers;

use Livewire\Component;
use App\Models\Subscribe;
use Livewire\WithPagination;

class SubscribersData extends Component
{
    use WithPagination;

    public $serarch;

    public function updatingSerarch()
    {
        $this->resetPage();
    }
    protected $listeners = ['refreshData','$refresh'];

    public function render()
    {
        return view('admin.subscribers.subscribers-data',
        ['data'=>Subscribe::where('email','like','%'. $this->serarch .'%')->paginate(10)]);
    }
}
