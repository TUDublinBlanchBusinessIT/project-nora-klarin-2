<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;


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

    public function index()
    {
        $customers = User::where('role', 'customer')->get();

        return view('admin.customers.index', compact('customers'));
    }
}
