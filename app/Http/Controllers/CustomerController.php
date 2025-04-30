<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Carbon\Carbon;


class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $now = Carbon::now('Europe/Dublin');

        $upcoming = Appointment::where('user_id', auth()->id())
            ->where('appointment_date', '>', $now) // strictly in the future
            ->orderBy('appointment_date', 'asc')
            ->get();

            $past = Appointment::where('user_id', auth()->id())
            ->where('appointment_date', '<=', $now) // in the past or exactly now
            ->orderBy('appointment_date', 'desc')
            ->get();
        $services = Service::all(); 

    
        return view('customer.dashboard', compact('upcoming', 'services','past'));
    }

    public function index()
    {
        $customers = User::where('role', 'customer')->get();

        return view('admin.customers.index', compact('customers'));
    }
}
