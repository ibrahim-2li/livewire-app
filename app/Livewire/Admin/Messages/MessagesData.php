<?php

namespace App\Livewire\Admin\Messages;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class MessagesData extends Component
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
        return view('admin.messages.messages-data',
        ['data'=>Message::where('name','like','%'. $this->serarch .'%')->latest()->paginate(10)]);
    }
}
