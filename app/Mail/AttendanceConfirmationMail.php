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
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendanceConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Attendance $attendance,
        public Event $event
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
                'qrCode' => $this->generateQrCode(),
            ],
        );
    }

    /**
     * Generate QR code for the attendance
     * Returns base64-encoded SVG image embedded inline for email compatibility
     * Uses SVG format which doesn't require imagick extension
     */
    private function generateQrCode(): string
    {
        $qrData = json_encode([
            'type' => 'attendance',
            'event_id' => $this->event->id,
            'token' => $this->attendance->qr_token,
            'attendee_name' => $this->attendance->attendee_name,
            'attendee_email' => $this->attendance->attendee_email,
        ]);

        // Generate QR code as SVG (doesn't require imagick extension)
        $qrSvg = QrCode::format('svg')->size(200)->generate($qrData);

        // Convert to base64 for inline embedding
        $base64 = base64_encode($qrSvg);

        // Return as data URI (embedded directly in email, no external URL needed)
        // SVG works in most modern email clients including Outlook, Apple Mail, Hotmail, etc.
        // Note: Gmail has limited SVG support, but base64-embedded SVG may work in newer versions
        return '<img src="data:image/svg+xml;base64,' . $base64 . '" alt="QR Code" style="max-width: 200px; height: auto; display: block; margin: 0 auto;" />';
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
