<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

class AdminForgotPasswordComponent extends Component
{
    public $email;
    public $status;

    public function rules()
    {
        return [
            'email' => 'required|string|email',
        ];
    }

    public function submit()
    {
        $this->validate();

        // Use the admin guard for password reset
        $status = Password::broker('admins')->sendResetLink(
            ['email' => $this->email]
        );

        if ($status == Password::RESET_LINK_SENT) {
            $this->status = __($status);
            session()->flash('success', 'تم إرسال رابط إعادة تعيين كلمة المرور إلى بريدك الإلكتروني.');
            $this->reset('email'); // Clear the email field on success
        } else {
            // Handle different password reset statuses
            $errorMessage = match($status) {
                Password::INVALID_USER => 'البريد الإلكتروني غير مسجل في النظام.',
                Password::INVALID_TOKEN => 'رابط إعادة التعيين غير صالح أو منتهي الصلاحية.',
                Password::THROTTLED => 'تم إرسال طلبات كثيرة. يرجى المحاولة مرة أخرى لاحقاً.',
                default => 'حدث خطأ أثناء إرسال رابط إعادة تعيين كلمة المرور. يرجى المحاولة مرة أخرى.'
            };
            $this->addError('email', $errorMessage);
        }
    }

    public function render()
    {
        return view('admin.auth.admin-forgot-password-component');
    }
}

