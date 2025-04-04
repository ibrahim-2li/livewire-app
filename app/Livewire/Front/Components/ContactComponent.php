<?php

namespace App\Livewire\Front\Components;

use App\Models\Message;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name, $email, $subject, $message;

    public function rules(){
        return [
            'name' => 'required',
            'email' => 'required|email|unique:messages,email',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function submit(){
        $data = $this->validate();
        Message::create($data);
        session()->flash('message','Message Send Successfully');
        $this->reset('name','email','subject','message');
    }

    public function render()
    {
        return view('front.components.contact-component');
    }
}
