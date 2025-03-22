<?php

namespace App\Livewire\Admin\Messages;

use App\Models\Message;
use Livewire\Component;
use App\Livewire\Admin\Messages\MessagesData;

class MessagesDelete extends Component
{
    public $messages;
    protected $listeners = ['messagesDelete'];

    public function messagesDelete($id)
    {
        $this->messages = Message::find($id);

        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        $this->messages->delete('messages');
        // $this->reset('messages');
        $this->dispatch('deleteModalToggle');
        $this->dispatch('refreshData')->to(MessagesData::class);
    }
    public function render()
    {
        return view('admin.messages.messages-delete');
    }
}
