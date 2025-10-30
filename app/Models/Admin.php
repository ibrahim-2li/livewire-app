<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Event;
use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;


    const ROLE_USER = 'USER';
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_SCANNER = 'SCANNER';

    const ROLES = [
        self::ROLE_USER => 'User',
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_SCANNER => 'Scanner',
    ];

    protected function avatar(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? asset('/' . $value) : asset('storage/avatar/default.png')
        );
    }
    //

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The primary key associated with the table.
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
    protected $guarded = [];
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'admin';

    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
        // 'status' => Status::class,
    ];

    ##--------------------------------- RELATIONSHIPS
    // public function branches() {
    //     return $this->hasMany(Branch::class);
    // }


    ##--------------------------------- ATTRIBUTES


    ##--------------------------------- CUSTOM FUNCTIONS


    ##--------------------------------- SCOPES
    // public function scopeActive($query)
    // {
    //     $query->where('status', Status::ACTIVE);
    // }



    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    public function isScanner(): bool
    {
        return $this->role === self::ROLE_SCANNER;
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }


    ##--------------------------------- ACCESSORS & MUTATORS
}
