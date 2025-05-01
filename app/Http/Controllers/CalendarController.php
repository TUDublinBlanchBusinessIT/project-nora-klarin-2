<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Appointment;
class CalendarController extends Controller
{
    public function display()
    {
        return view('calendar.display');
    }
    public function json(Request $request)
    {
        $appointments = Appointment::with(['user', 'service', 'technician'])->get();
    
        $events = $appointments->map(function ($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->user->name . ' - ' . $appointment->service->name,
                'start' => $appointment->appointment_date,
                'venue' => $appointment->technician ? 'Technician: ' . $appointment->technician->name : '',
            ];
        });
    
        return response()->json($events);
    }
    
}
?>