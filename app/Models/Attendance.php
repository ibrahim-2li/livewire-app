<?php

namespace App\Models;

use App\Models\Admin;
use App\Http\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;

    protected $fillable = [
        'event_id',
        'admin_id',
        'country',
        'qr_token',
        'used_at',
        'checked_in_by',
    ];

    protected function casts(): array
    {
        return [
            'used_at' => 'datetime',
        ];
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function generateQrToken(): string
    {
        return 'attendee_' . bin2hex(random_bytes(16));
    }

    public function isCheckedIn(): bool
    {
        return !is_null($this->used_at);
    }

    public function checkIn(string $checkedInBy): bool
    {
        if ($this->isCheckedIn()) {
            return false;
        }

        return $this->update([
            'used_at' => now(),
            'checked_in_by' => $checkedInBy,
        ]);
    }

    public function getQrCodeDataAttribute(): array
    {
        return [
            'type' => 'attendance',
            'event_id' => $this->event_id,
            'token' => $this->qr_token,
        ];
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }
}
