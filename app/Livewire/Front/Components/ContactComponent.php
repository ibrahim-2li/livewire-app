<?php

namespace App\Livewire\Front\Components;

use App\Models\Message;
use Livewire\Component;

class ContactComponent extends Component
{
    public $name, $email, $subject, $message;

    public function rules(){
        $rules =   [
            'name' => 'required',
            'email' => 'required|email|unique:messages,email',
            'subject' => 'required',
            'message' => 'required',
        ];
    return $rules;
    }
    public function messages()
{
    return [
        'name.required' => __('Name is required'),
        'email.required' => __('Email is required'),
        'email.email' => __('Email must be valid'),
        'subject.required' => __('Subject is required'),
        'message.required' => __('Message body is required'),
    ];
}

    public function submit(){
        $data = $this->validate();
        Message::create($data);
        session()->flash('message',__('Message Send Successfully'));
        $this->reset('name','email','subject','message');
    }

    public function render()
    {
        return view('front.components.contact-component');
    }
}
