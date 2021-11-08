<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'title',
        'image',
        'content'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
