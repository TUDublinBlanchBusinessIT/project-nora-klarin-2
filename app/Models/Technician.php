<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

}
