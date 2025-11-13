<?php

namespace App\Services;

use App\Models\Attendance;
use App\Models\Event;

class QrCodeService
{
    /**
     * Generate QR code data for an event
     */
    public function generateEventQrData(Event $event): array
    {
        return [
            'type' => 'event',
            'event_id' => $event->id,
            'token' => $event->qr_token,
            'title' => $event->title,
        ];
    }

    /**
     * Generate QR code data for attendance
     */
    public function generateAttendanceQrData(Attendance $attendance): array
    {
        // Load user relationship if not already loaded
        if (! $attendance->relationLoaded('user')) {
            $attendance->load('user');
        }

        // Ensure user relationship exists
        if (! $attendance->user) {
            throw new \Exception('Attendance user relationship is missing. Admin ID: ' . $attendance->admin_id);
        }

        return [
            'type' => 'attendance',
            'event_id' => $attendance->event_id,
            'token' => $attendance->qr_token,
            'name' => $attendance->user->name,
        ];
    }

    /**
     * Generate QR code image for attendance
     */
    public function generateAttendanceQrCode(Attendance $attendance): string
    {
        // For now, use the fallback method (Google Charts API)
        // This ensures the system works without complex QR code generation
        return $this->generateQrCodeDataUrl($attendance);
    }

    /**
     * Generate QR code as data URL (fallback method)
     */
    private function generateQrCodeDataUrl(Attendance $attendance): string
    {
        $qrData = $this->generateAttendanceQrData($attendance);
        $qrDataJson = json_encode($qrData);

        // Create a simple QR code using Google Charts API as fallback
        $size = 200;
        $data = urlencode($qrDataJson);

        // return "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl={$data}";
        return "https://api.qrserver.com/v1/create-qr-code/?size={$size}x{$size}&data={$data}";
    }

    /**
     * Verify and process QR code scan
     */
    public function processQrScan(string $qrData, string $checkedInBy): array
    {
        try {
            // Try raw JSON
            $data = json_decode($qrData, true);

            // If not JSON, try URL-decoding once (common when QR contains encoded payload)
            if (! $data) {
                $decodedOnce = urldecode($qrData);
                $data = json_decode($decodedOnce, true);
            }

            // If still not JSON, try base64 decoding (some generators use base64)
            if (! $data && base64_decode($qrData, true) !== false) {
                $decodedBase64 = base64_decode($qrData, true);
                $data = json_decode((string) $decodedBase64, true);
            }

            // If the string looks like a URL with a `data` query param, extract and decode it
            if (! $data && str_starts_with($qrData, 'http')) {
                $parts = parse_url($qrData);
                if (! empty($parts['query'])) {
                    parse_str($parts['query'], $query);
                    if (isset($query['data'])) {
                        $maybeJson = urldecode((string) $query['data']);
                        $data = json_decode($maybeJson, true);
                        if (! $data && base64_decode((string) $query['data'], true) !== false) {
                            $data = json_decode((string) base64_decode((string) $query['data'], true), true);
                        }
                    }
                }
            }

            if (! $data || ! isset($data['type'], $data['token'])) {
                return [
                    'success' => false,
                    'message' => 'Invalid QR code format',
                ];
            }

            switch ($data['type']) {
                case 'attendance':
                    return $this->processAttendanceScan($data, $checkedInBy);
                case 'event':
                    return $this->processEventScan($data, $checkedInBy);
                default:
                    return [
                        'success' => false,
                        'message' => 'Unknown QR code type',
                    ];
            }
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Invalid QR code data',
            ];
        }
    }

    /**
     * Process attendance QR scan with atomic verification
     */
    protected function processAttendanceScan(array $data, string $checkedInBy): array
    {
        $attendance = Attendance::where('qr_token', $data['token'])
            ->whereNull('used_at')
            ->with(['event', 'user'])
            ->first();

        if (! $attendance) {
            return [
                'success' => false,
                'message' => 'QR code not found or already used',
            ];
        }

        if (! $attendance->event->is_active) {
            return [
                'success' => false,
                'message' => 'Event is not active',
            ];
        }

        // Allow early check-in within a small grace window before the event starts
        $earlyCheckInWindowMinutes = 30;
        if (now()->lt($attendance->event->start_date->copy()->subMinutes($earlyCheckInWindowMinutes))) {
            return [
                'success' => false,
                'message' => 'Event has not started yet',
            ];
        }

        if (now()->gt($attendance->event->end_date)) {
            return [
                'success' => false,
                'message' => 'Event has ended',
            ];
        }

        // Atomic check-in using database transaction
        try {
            \DB::transaction(function () use ($attendance, $checkedInBy) {
                // Double-check the token hasn't been used in another transaction
                $freshAttendance = Attendance::where('qr_token', $attendance->qr_token)
                    ->whereNull('used_at')
                    ->lockForUpdate()
                    ->first();

                if (! $freshAttendance) {
                    throw new \Exception('Token already used');
                }

                $freshAttendance->checkIn($checkedInBy);
            });

            // Reload attendance with user relationship after check-in
            $attendance->refresh();
            $attendance->load('user');

            return [
                'success' => true,
                'message' => "Successfully checked in {$attendance->user->name}",
                'data' => [
                    'attendee_name' => $attendance->user->name,
                    'event_title' => $attendance->event->title,
                    'checked_in_at' => now()->toISOString(),
                ],
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Check-in failed. QR code may have already been used.',
            ];
        }
    }

    /**
     * Process event QR scan (for event info)
     */
    protected function processEventScan(array $data, string $checkedInBy): array
    {
        $event = Event::where('qr_token', $data['token'])
            ->where('is_active', true)
            ->first();

        if (! $event) {
            return [
                'success' => false,
                'message' => 'Event not found or inactive',
            ];
        }

        return [
            'success' => true,
            'message' => 'Event information retrieved',
            'data' => [
                'event_title' => $event->title,
                'description' => $event->description,
                'start_date' => $event->start_date->toISOString(),
                'end_date' => $event->end_date->toISOString(),
                'location' => $event->location,
                'total_attendees' => $event->total_attendees,
                'checked_in_count' => $event->checked_in_count,
            ],
        ];
    }
}
