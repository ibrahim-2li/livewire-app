<?php

namespace App\Mail;

use Storage;
use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AttendanceConfirmationMail extends Mailable
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
     */
    private function generateQrCode(): string
{
    // $qrData = json_encode([
    //     'type' => 'attendance',
    //     'event_id' => $this->event->id,
    //     'token' => $this->attendance->qr_token,
    //     'attendee_name' => $this->attendance->attendee_name,
    //     'attendee_email' => $this->attendance->attendee_email,
    // ]);

    $qrData = json_encode([
        'type' => 'attendance',
        'event_id' => $this->event->id,
        'token' => $this->attendance->qr_token,
        'attendee_name' => $this->attendance->attendee_name,
        'attendee_email' => $this->attendance->attendee_email,
    ]);

    $qrSvg = QrCode::format('svg')->size(200)->generate($qrData);

    // Save SVG to storage
    $fileName = 'qr_' . $this->attendance->qr_token . '.svg';
    $filePath = storage_path('app/public/qrcodes/' . $fileName);

    Storage::disk('public')->put('qrcodes/' . $fileName, QrCode::format('svg')->size(200)->generate($qrData));

    // Generate public URL
    $url = asset('storage/qrcodes/' . $fileName);

    return '<img src="' . $url . '" alt="QR Code" style="max-width: 200px; height: auto;" />';
}

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
