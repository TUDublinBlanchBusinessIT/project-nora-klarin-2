<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Technician;

class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $now = Carbon::now('Europe/Dublin');

        $upcoming = Appointment::with('service', 'technician')
        ->where('user_id', auth()->id())
        ->where('appointment_date', '>=', now())
        ->orderBy('appointment_date')
        ->get();
        
        $past = Appointment::with('service', 'technician')
        ->where('user_id', auth()->id())
        ->where('appointment_date', '<', now())
        ->orderByDesc('appointment_date')
        ->get();
          
        $technicians = Technician::all(); 
        return view('customer.dashboard', compact('upcoming','past', 'technicians'));
    }

    public function index()
    {
        $customers = User::where('role', 'customer')->get();

        return view('admin.customers.index', compact('customers'));
    }
}
