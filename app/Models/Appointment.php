<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'appointment_date',
        'technician_id',
        'preferred_technician_id',
        'medication',
        'sun_exposure',
        'status',
    ];
}
