@extends('layouts.app')

@section('content')
<h1>Admin Dashboard</h1>

<ul>
  <li>Total Appointments: {{ $appointmentsCount }}</li>
  <li>Total Customers: {{ $customersCount }}</li>
  <li>Total Services: {{ $servicesCount }}</li>
</ul>

<div class="mb-4">
  <a href="{{ route('appointments.index') }}" class="btn btn-secondary">
    Manage All Appointments
  </a>
</div>

<a class="nav-link" href="{{ route('technicians.index') }}">Manage Technicians</a>

<h2>Latest 5 Appointments</h2>
<ul>
  @foreach($latestAppointments as $appt)
    <li>
      {{ $appt->user->name }}
      booked {{ $appt->service->name }}
      on {{ \Carbon\Carbon::parse($appt->appointment_date)->format('d M Y, H:i') }}
    </li>
  @endforeach
</ul>
@endsection
