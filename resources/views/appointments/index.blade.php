<h1>All Appointments</h1>

@foreach ($appointments as $appointment)
    <p>{{ $appointment->customer_name }} - {{ $appointment->appointment_date }}</p>
@endforeach
