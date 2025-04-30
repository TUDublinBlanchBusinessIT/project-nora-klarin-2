<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            ['name' => 'Full Body Massage', 'price' => 70],
            ['name' => 'Facial Treatment', 'price' => 50],
            ['name' => 'Manicure', 'price' => 25],
            ['name' => 'Pedicure', 'price' => 30],
            ['name' => 'Eyebrow Shaping', 'price' => 15],
            ['name' => 'Waxing (Full Leg)', 'price' => 40],
            ['name' => 'Haircut & Blowdry', 'price' => 55],
            ['name' => 'Makeup Application', 'price' => 45],
            ['name' => 'Spray Tan', 'price' => 35],
            ['name' => 'Lash Lift & Tint', 'price' => 40],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
