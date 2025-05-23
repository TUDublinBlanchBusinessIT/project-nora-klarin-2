<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Appointment;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }
    
    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
        ]);

        Service::create($request->only(['name','description','price']));
        return redirect()->route('services.index')
                         ->with('success','Service added.');
    }


    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'  => 'required|string',
            'price' => 'required|numeric',
        ]);

        $service->update($request->only(['name','description','price']));
        return redirect()->route('services.index')
                         ->with('success','Service updated.');
    }

    // Admin: Delete
    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success','Service removed.');
    }
}
