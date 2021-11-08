<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    const PENDING = 'pending';
    const ACCEPTED = 'accepted';
    const DECLINED = 'declined';

    protected $fillable = [
        'patient_id',
        'name',
        'gender',
        'contact_number',
        'dob',
        'address',
        'schedule_date',
        'schedule_time',
        'reason',
        'status'
    ];

    protected $casts = [
        'schedule_date' => 'date',
        'schedule_time' => 'datetime'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
