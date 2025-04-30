<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;

class TechnicianController extends Controller
{
    public function index()
    {
        $technicians = Technician::orderBy('name')->paginate(10);
        return view('technicians.index', compact('technicians'));
    }

    public function create()
    {
        return view('technicians.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:technicians,email',
            'phone' => 'nullable|string|max:20',
        ]);

        Technician::create($validated);

        return redirect()->route('technicians.index')
                         ->with('success', 'Technician created successfully.');
    }

    public function edit(Technician $technician)
    {
        return view('technicians.edit', compact('technician'));
    }

    public function update(Request $request, Technician $technician)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:technicians,email,' . $technician->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $technician->update($validated);

        return redirect()->route('technicians.index')
                         ->with('success', 'Technician updated successfully.');
    }

    public function destroy(Technician $technician)
    {
        $technician->delete();

        return redirect()->route('technicians.index')
                         ->with('success', 'Technician deleted successfully.');
    }
}
