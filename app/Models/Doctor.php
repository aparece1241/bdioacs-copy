<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialized',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function secretary()
    {
        return $this->hasOne(Secretary::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function diseases()
    {
        return $this->hasMany(Disease::class);
    }
}
