<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Appointment
 * @package App\Models
 * @version April 28, 2025, 12:57 pm UTC
 *
 * @property \App\Models\Service $service
 * @property \App\Models\Customer $customer
 * @property string|\Carbon\Carbon $appointment_date
 * @property integer $service_id
 * @property integer $customer_id
 * @property string $status
 */
class Appointment extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'appointments';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'appointment_date',
        'service_id',
        'customer_id',
        'status',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'appointment_date' => 'datetime',
        'service_id' => 'integer',
        'customer_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'appointment_date' => 'nullable',
        'service_id' => 'nullable|integer',
        'customer_id' => 'nullable|integer',
        'status' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }
}
