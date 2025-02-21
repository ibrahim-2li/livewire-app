<?php

namespace App\Livewire\Admin\Settings;

use App\Models\Setting;
use Livewire\Component;

class UpdateSettings extends Component
{
    public Setting $settings;

    public function mount()
    {
        $this->settings = Setting::find(1);
    }

    public function rules()
    {
        return [
            'settings.name' => 'required',
            'settings.email'=> 'required|email',
            'settings.phone'=> 'required',
            'settings.address'=> 'required',
            'settings.facebook'=> 'nullable|url',
            'settings.twitter'=> 'nullable|url',
            'settings.linkedin'=> 'nullable|url',
            'settings.instgram'=> 'nullable|url',
        ];
    }

    public function attributes()
    {
        return [
            'settings.name' => 'Name',
            'settings.email'=> 'Email',
            'settings.phone'=> 'Phone',
            'settings.address'=> 'Address',
            'settings.facebook'=> 'Facebook',
            'settings.twitter'=> 'Twitter',
            'settings.linkedin'=> 'LinkedIn',
            'settings.instgram'=> 'Instgram',
        ];
    }

    public function submit()
    {
        $this->validate($this->rules(), [],
        $this->attributes());
        $this->settings->save();
        session()->flash('message','Settings Updated Successfuly');

    }

    public function render()
    {
        return view('admin.settings.update-settings');
    }
}
