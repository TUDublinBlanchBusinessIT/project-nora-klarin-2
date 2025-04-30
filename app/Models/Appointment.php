<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;    
use App\Models\Service;
use App\Models\Technician;


class Appointment extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'user_id',
        'service_id',
        'appointment_date',
        'technician_id',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }    

    public function technician()
    {
        return $this->belongsTo(Technician::class);
    }
    public function review()
    {
        return $this->hasOne(Review::class);
    }

}
