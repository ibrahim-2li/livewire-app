<?php

namespace App\Livewire\Front\Components;

use App\Models\Setting;
use Livewire\Component;

class SettingsComponent extends Component
{
    public Setting $settings;

    public function mount()
    {
        $this->settings = Setting::find(1);
    }
    public function render()
    {
        return view('front.components.settings-component');
    }
}
