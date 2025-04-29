<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Service;

class AdminController extends Controller
{
    public function dashboard()
    {
        $appointmentsCount = Appointment::count();
        $customersCount    = User::where('role','customer')->count();
        $servicesCount     = Service::count();
        $latestAppointments= Appointment::with('user','service')
                                         ->latest()
                                         ->take(5)
                                         ->get();

        return view('admin.dashboard', compact(
            'appointmentsCount','customersCount','servicesCount','latestAppointments'
        ));
    }
}
