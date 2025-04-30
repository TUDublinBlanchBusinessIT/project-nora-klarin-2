<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Appointment;
use App\Models\Technician;

class ReviewController extends Controller
{
    public function create($technicianId)
    {
        $technician = Technician::findOrFail($technicianId);
        return view('reviews.create', compact('technician'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'appointment_id' => 'required|exists:appointments,id',
            'technician_id' => 'required|exists:technicians,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:500',
        ]);

        $appointment = Appointment::where('id', $data['appointment_id'])
                                   ->where('user_id', auth()->id())
                                   ->firstOrFail();

        if ($appointment->review) {
            return back()->with('error', 'You have already reviewed this appointment.');
        }

        Review::create([
            'appointment_id' => $appointment->id,
            'technician_id' => $data['technician_id'],
            'user_id' => auth()->id(),
            'rating' => $data['rating'],
            'comment' => $data['comment'],
        ]);

        return back()->with('success', 'Review submitted!');
    }
}
