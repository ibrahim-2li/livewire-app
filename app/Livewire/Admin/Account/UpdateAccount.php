<?php
namespace App\Livewire\Admin\Account;

use App\Models\Admin;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdateAccount extends Component
{
    use WithFileUploads;

    public Admin $user;
    public $newAvatar; // Separate property for file upload

    public function mount()
    {
        $this->user = Admin::find(1);
    }

    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email',
            'user.phone' => 'nullable|string',
            'user.address' => 'nullable|string',
            'newAvatar' => 'nullable|image|max:800', // Validate image separately
        ];
    }

    public function attributes()
    {
        return [
            'user.name' => 'Name',
            'user.email' => 'Email',
            'user.phone' => 'Phone',
            'user.address' => 'Address',
            'newAvatar' => 'Avatar',
        ];
    }

    public function submit()
    {
        $this->validate();

        // Handle avatar upload
        if ($this->newAvatar) {
            // Delete old avatar if exists
            if ($this->user->avatar) {
                Storage::delete(str_replace('storage/', 'public/', $this->user->avatar));
            }

            // Save new avatar
            $imageName = time() . '.' . $this->newAvatar->getClientOriginalExtension();
            $this->newAvatar->storeAs('public/images', $imageName);
            $this->user->avatar = 'storage/images/' . $imageName;
        }

        $this->user->save();

        session()->flash('message', 'Account Updated Successfully!');
    }

    public function render()
    {
        return view('admin.account.update-account');
    }
}
