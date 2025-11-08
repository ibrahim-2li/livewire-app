<?php

namespace App\Mail;

use App\Models\Attendance;
use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendanceConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Attendance $attendance,
        public Event $event
    ) {
        //
    }

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

        // Generate SVG QR code (doesn't require imagick extension)
        $qrCodeSvg = QrCode::size(200)
            ->format('svg')
            ->generate($qrData);

        // Convert SVG to base64 data URI and embed in img tag for better email compatibility
        $base64 = base64_encode($qrCodeSvg);
        return '<img src="data:image/svg+xml;base64,' . $base64 . '" alt="QR Code" style="max-width: 200px; height: auto;" />';
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
