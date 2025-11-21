<?php

namespace App\Mail;

use App\Models\Admin;
use App\Models\Event;
use App\Models\Setting;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class NewUserMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Admin $admin,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'مرحباً بك في منصة الفعاليات - ' . $this->admin->name,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $email = Setting::first()->email;
        return new Content(
            view: 'emails.new-user',
            with: [
                'admin' => $this->admin,
                'email' => $email,
            ],
        );
    }

    /**
     * Generate QR code for the attendance
     * Returns base64-encoded SVG image embedded inline for email compatibility
     * Uses SVG format which doesn't require imagick extension
     */

}
