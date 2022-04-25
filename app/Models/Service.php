<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'service',
        'service_type',
        'department',
        'fee',
        'professional_fee_min',
        'professional_fee_max'
    ];
}
