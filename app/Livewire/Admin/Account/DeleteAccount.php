<?php

namespace App\Livewire\Admin\Account;

use App\Models\Admin;
use Livewire\Component;

class DeleteAccount extends Component
{
    public $user;
    public bool $confirmDeletion = false; // Track checkbox state

    protected $listeners = ['accountDelete' => 'confirmDelete'];

    public function mount()
    {
        $this->user = auth('admin')->user();
    }

    public function confirmDelete()
    {
        $this->dispatch('deleteModalToggle');
    }

    public function submit()
    {
        if (!$this->confirmDeletion) {
            session()->flash('error', 'You must confirm account deletion before proceeding.');
            return;
        }

        if ($this->user) {
            $this->user->delete();
            session()->flush(); // Log out user after deletion

            $this->dispatch('deleteModalToggle');
            return redirect()->to('/admin/login'); // Redirect after deletion
        }
    }

    public function render()
    {
        return view('admin.account.delete-account');
    }
}
