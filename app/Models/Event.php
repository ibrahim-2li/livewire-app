<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    //

     /**
     * The table associated with the model.
     *
     * @var string
     */

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
        // 'status' => Status::class,
    ];

    ##--------------------------------- RELATIONSHIPS


    ##--------------------------------- ATTRIBUTES


    ##--------------------------------- CUSTOM FUNCTIONS


    ##--------------------------------- SCOPES
    // public function scopeActive($query)
    // {
    //     $query->where('status', Status::ACTIVE);
    // }
    protected $fillable = [
        'admin_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'location',
        'qr_token',
        'is_active',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->qr_token)) {
                $event->qr_token = $event->generateQrToken();
            }
        });
    }

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function checkedInAttendances(): HasMany
    {
        return $this->attendances()->whereNotNull('used_at');
    }

    public function pendingAttendances(): HasMany
    {
        return $this->attendances()->whereNull('used_at');
    }

    public function generateQrToken(): string
    {
        return 'event_' . bin2hex(random_bytes(16));
    }

    public function getTotalAttendeesAttribute(): int
    {
        return $this->attendances()->count();
    }

    public function getCheckedInCountAttribute(): int
    {
        return $this->checkedInAttendances()->count();
    }

    ##--------------------------------- ACCESSORS & MUTATORS
}
