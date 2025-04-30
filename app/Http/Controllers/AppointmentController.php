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
        $data = $request->validate([
            'service_id'       => 'required|exists:services,id',
            'appointment_date' => 'required|date|after:now',
            'technician_id'    => 'nullable|exists:technicians,id',
            'notes'            => 'nullable|string|max:500',
        ]);
    
        Appointment::create([
            'user_id'          => auth()->id(),
            'service_id'       => $data['service_id'],
            'appointment_date' => $data['appointment_date'],
            'technician_id'    => $data['technician_id'] ?? null,
            'notes'            => $data['notes'] ?? null,
        ]);
    
        return redirect()->route('appointments.mine')->with('success','Appointment booked!');
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
        $technicians = Technician::orderBy('name')->get();
        return view('admin.appointments.edit', compact('appointment', 'services', 'users', 'technicians'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->merge(['technician_id' => $request->technician_id ?: null]);

        $data = $request->validate([
            'service_id'       => 'required|exists:services,id',
            'user_id'          => 'required|exists:users,id',
            'appointment_date' => 'required|date|after:now',
            'technician_id'    => 'nullable|exists:technicians,id',
        ]);
    
        $appointment->update([
            'service_id'       => $data['service_id'],
            'user_id'          => $data['user_id'],
            'appointment_date' => $data['appointment_date'],
            'technician_id'    => $data['technician_id'] ?? null,
        ]);
    
        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment updated.');
    }
    

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success', 'Appointment removed.');
    }
    public function dashboard()
{
    $user = auth()->user();

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

    return view('customer.dashboard', compact('upcoming', 'past', 'technicians'));  // <-- technicians not technician
}
}
