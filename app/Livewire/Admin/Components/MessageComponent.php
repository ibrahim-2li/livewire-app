<?php

namespace App\Livewire\Admin\Components;

use App\Models\Message;
use Livewire\Component;

class MessageComponent extends Component
{
    public function render()
    {
        return view('admin.components.message-component',[
            'message_count' => Message::all()->where('status','0')->count(),
        ]);
    }
}
