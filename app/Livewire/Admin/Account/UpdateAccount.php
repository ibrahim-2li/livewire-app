<?php
namespace App\Livewire\Admin\Account;

use App\Models\Admin;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UpdateAccount extends Component
{
    use WithFileUploads;

    public Admin $user;
    public $newAvatar; // Separate property for file upload

    public function mount(Request $request)
    {
        $this->user = $request->user();
    }

    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email',
            'user.nationality' => 'required',
            'user.phone' => 'nullable|string',
            'user.job_title' => 'nullable|string',
            'user.gender' => 'required|in:male,female',
            // 'newAvatar' => 'nullable|image|max:800', // Validate image separately
        ];
    }

    public function attributes()
    {
        return [
            'user.name' => 'Name',
            'user.email' => 'Email',
            'user.nationality' => 'Nationality',
            'user.phone' => 'Phone',
            'user.job_title' => 'job_title',
            'user.gender' => 'Gender',
            // 'newAvatar' => 'Avatar',
        ];
    }

    public function submit()
    {
        $this->validate();

        $updateData = $this->user->toArray();

        // Handle avatar upload
        if ($this->newAvatar) {
            // Delete old avatar if exists
            if ($this->user->avatar) {
                Storage::delete(str_replace('storage/', 'public/', $this->user->avatar));
            }

            // Save new avatar
            $imageName = time() . '.' . $this->newAvatar->getClientOriginalExtension();
            $this->newAvatar->storeAs('public/images', $imageName);
            $updateData['avatar'] = 'storage/images/' . $imageName;
        }

        $this->user->update($updateData);

        session()->flash('message', 'Account Updated Successfully!');
    }

    public function render()
    {
        return view('admin.account.update-account');
    }
}
