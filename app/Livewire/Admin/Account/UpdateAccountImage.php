<?php

namespace App\Livewire\Admin\Account;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdateAccountImage extends Component
{
    use WithFileUploads;

    public Admin $user;
    public $newAvatar;

    public function mount(Request $request)
    {
        $this->user = $request->user();
    }

    public function rules()
    {
        return [
            'newAvatar' => 'nullable|image|max:800',
        ];
    }

    public function updateAvatar()
    {
        $this->validate();

        if ($this->newAvatar) {
            // Delete old avatar if exists
            if ($this->user->avatar) {
                Storage::delete(str_replace('storage/', 'public/', $this->user->avatar));
            }

            // Save new avatar
            $imageName = time() . '.' . $this->newAvatar->getClientOriginalExtension();
            $this->newAvatar->storeAs('public/images', $imageName);

            $this->user->update(['avatar' => 'storage/images/' . $imageName]);

            session()->flash('message', 'Avatar updated successfully!');
            $this->newAvatar = null; // Reset the property
        }
    }

    public function render()
    {
        return view('admin.account.update-account-image');
    }
}
