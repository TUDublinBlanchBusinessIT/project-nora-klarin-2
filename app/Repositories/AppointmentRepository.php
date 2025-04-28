<?php

namespace App\Repositories;

use App\Models\Appointment;
use App\Repositories\BaseRepository;

/**
 * Class AppointmentRepository
 * @package App\Repositories
 * @version April 28, 2025, 12:57 pm UTC
*/

class AppointmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'appointment_date',
        'service_id',
        'customer_id',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Appointment::class;
    }
}
