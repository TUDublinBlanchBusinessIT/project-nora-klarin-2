@extends('layouts.app')

@section('content')
<h1>Hello, {{ auth()->user()->name }}</h1>

<h2>Your Upcoming Appointments</h2>
@if($appointments->isEmpty())
  <p>No upcoming appointments. <a href="{{ route('appointments.create') }}">Book one</a>.</p>
@else
  <ul>
    @foreach($appointments as $appt)
      <li>
        {{ $appt->service->name }}
        on {{ \Carbon\Carbon::parse($appt->appointment_date)->format('d M Y, H:i') }}
      </li>
    @endforeach
  </ul>
@endif
@endsection
