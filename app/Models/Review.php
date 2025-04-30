<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['appointment_id', 'technician_id', 'user_id', 'rating', 'comment'];

    public function appointment() { return $this->belongsTo(Appointment::class); }
    public function technician() { return $this->belongsTo(Technician::class); }
    public function user() { return $this->belongsTo(User::class); }

}
