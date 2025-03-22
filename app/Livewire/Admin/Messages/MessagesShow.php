<?php

namespace App\Livewire\Admin\Messages;

use App\Models\Message;
use Livewire\Component;
use App\Livewire\Admin\Messages\MessagesData;

class MessagesShow extends Component
{
    public  $name ,$email, $subject ,$message ,$status;
    protected $listeners = ['messagesShow'];

    public function messagesShow($id)
    {
        $record = Message::find($id);

        $this->name = $record->name;
        $this->email = $record->email;
        $this->subject = $record->subject;
        $this->message = $record->message;
        $this->status = $record->status;

        $this->dispatch('showModalToggle');
        $record->Update(['status'=>'1']);
        $this->dispatch('refreshData')->to(MessagesData::class);
    }
    public function render()
    {
        return view('admin.messages.messages-show');
    }
}
