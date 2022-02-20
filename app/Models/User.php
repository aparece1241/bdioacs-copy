<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory,
        Notifiable,
        HasRoles;

    /**
     * User's type
     */
    const ADMIN = 'Admin';
    const DOCTOR = 'Doctor';
    const PATIENT = 'Patient';
    const SECRETARY = 'Secretary';

    const ROLES = [self::ADMIN, self::DOCTOR, self::PATIENT, self::SECRETARY];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'profile',
        'email',
        'password',
        'type',
        'address',
        'contact_number',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
