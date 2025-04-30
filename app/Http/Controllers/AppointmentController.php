<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use App\Models\Technician;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        $services = Service::all();
        $technicians = Technician::all();
 
        return view('appointments.create', compact('services', 'technicians'));
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id'       => 'required|exists:services,id',
            'appointment_date' => 'required|date|after:now',
            'technician_id'    => 'nullable|exists:technicians,id',
        ]);
    
        auth()->user()->appointments()->create([
            'service_id'       => $validated['service_id'],
            'appointment_date' => $validated['appointment_date'],
            'technician_id'    => $validated['technician_id'] ?? null, // optional
        ]);
    
        return redirect()->route('appointments.mine')
                         ->with('success', 'Appointment booked!');
    }
    

    public function myAppointments()
    {
        $appointments = auth()->user()->appointments()
            ->with('service')
            ->orderBy('appointment_date','desc')
            ->get();

        return view('appointments.my', compact('appointments'));
    }

    public function index()
    {
        $appointments = Appointment::with(['user','service'])
                                   ->latest()
                                   ->get();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function edit(Appointment $appointment)
    {
        $services = Service::all();
        $users = User::where('role', 'customer')->get();
        return view('admin.appointments.edit', compact('appointment', 'services', 'users'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'service_id'       => 'required|exists:services,id',
            'user_id'          => 'required|exists:users,id',
            'appointment_date' => 'required|date|after:now',
        ]);

        $appointment->update($request->only([
            'service_id','user_id','appointment_date'
        ]));

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment updated.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success', 'Appointment removed.');
    }
}
