<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class customers
 * @package App\Models
 * @version April 28, 2025, 12:48 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $appointments
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 */
class customers extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'customers';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'firstname' => 'string',
        'lastname' => 'string',
        'email' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'firstname' => 'nullable|string|max:50',
        'lastname' => 'nullable|string|max:50',
        'email' => 'nullable|string|max:100',
        'phone' => 'nullable|string|max:15',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function appointments()
    {
        return $this->hasMany(\App\Models\Appointment::class, 'customer_id');
    }
}
