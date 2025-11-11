<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendanceConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Attendance $attendance,
        public Event $event,
        public array $qrData,
    ) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'تأكيد التسجيل في الحدث - ' . $this->event->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.attendance-confirmation',
            with: [
                'attendance' => $this->attendance,
                'event' => $this->event,
                'qrData' => $this->qrData,
            ],
        );
    }

    /**
     * Generate QR code for the attendance
     * Returns base64-encoded SVG image embedded inline for email compatibility
     * Uses SVG format which doesn't require imagick extension
     */

}
