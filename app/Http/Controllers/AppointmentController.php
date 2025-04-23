<?php
namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
     $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'appointment_date' => 'required|date',
        ]);

        Appointment::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'appointment_date' => $request->appointment_date,
            'technician_id' => $request->technician_id ?? null,  // Handle technician_id if not provided
            'preferred_technician_id' => $request->preferred_technician_id ?? null,  // Handle preferred_technician_id if not provided
        ]);

        // Redirect to the appointments listing or any page you want
        return redirect()->route('appointments.index');  // Or change to a view you want to redirect to
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully!');
    }

}
