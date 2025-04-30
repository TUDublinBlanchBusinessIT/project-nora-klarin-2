<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Http\Request;


class AppointmentController extends Controller
{
    public function create()
    {
        $services = Service::all();
        return view('appointments.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id'       => 'required|exists:services,id',
            'appointment_date' => 'required|date|after:now',
        ]);

        auth()->user()->appointments()->create($request->only([
            'service_id','appointment_date'
        ]));

        return redirect()->route('appointments.mine')
                         ->with('success','Appointment booked!');
    }

    // Customer: List own appointments
    public function myAppointments()
    {
        $appointments = auth()->user()->appointments()
            ->with('service')
            ->orderBy('appointment_date','desc')
            ->get();

        return view('appointments.my', compact('appointments'));
    }

    // Admin: List all
    public function index()
    {
        $appointments = Appointment::with(['user','service'])
                                   ->latest()
                                   ->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    // Admin: Delete
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success','Appointment removed.');
    }
}
