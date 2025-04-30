<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;


class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $appointments = $user->appointments()
                             ->where('appointment_date', '>=', now())
                             ->with('service')
                             ->orderBy('appointment_date')
                             ->get();
    
        $services = Service::all(); 
    
        return view('customer.dashboard', compact('appointments', 'services'));
    }
}
