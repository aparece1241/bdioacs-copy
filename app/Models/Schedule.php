<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Schedule extends Model
{
    use HasFactory, Notifiable;

    const PENDING = 'pending';
    const ACCEPTED = 'accepted';
    const DECLINED = 'declined';
    const APPROVED = 'approved';
    const PAID = 'paid';

    // schedule types
    const ONLINE = 'online';
    const PHYSICAL = 'physical';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'name',
        'gender',
        'contact_number',
        'dob',
        'address',
        'schedule_date',
        'schedule_time',
        'reason',
        'status',
        'type',
        'temperature',
        'height',
        'weight',
        'images',
    ];

    protected $casts = [
        'schedule_date' => 'date',
        'schedule_time' => 'datetime',
        'images' => 'array',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);

    }

    public function getDateAttribute()
    {
        return $this->schedule_date->format('Y-m-d');
    }

    // Create new schedule
    public function createSchedule($data)
    {
        return $this::create($data);
    }
}
