@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>

    <div class="mb-4">
        <a href="{{ route('appointments.create') }}" class="btn btn-primary btn-lg">
            Book a New Appointment
        </a>
    </div>

    <h2 class="mb-3">Your Upcoming Appointments</h2>
    <div class="card mb-4">
        <div class="card-body">
            @if($upcoming->isEmpty())
                <p>No upcoming appointments. <a href="{{ route('appointments.create') }}">Book one</a>.</p>
            @else
                <ul class="list-group list-group-flush">
                    @foreach($upcoming as $appt)
                        <li class="list-group-item">
                            <strong>{{ $appt->service->name }}</strong> on 
                            <span class="text-muted">{{ \Carbon\Carbon::parse($appt->appointment_date)->format('d M Y, H:i') }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <h2 class="mb-3">Your Past Appointments</h2>
    <div class="card mb-4">
        <div class="card-body">
            @if($past->isEmpty())
                <p>You have no past appointments yet.</p>
            @else
                <ul class="list-group list-group-flush">
                    @foreach($past as $appt)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $appt->service->name }}</strong>
                                <span class="text-muted">
                                    on {{ \Carbon\Carbon::parse($appt->appointment_date)->format('d M Y, H:i') }}
                                </span>
                            </div>
                            <div>
                                Technician: <em>{{ $appt->technician ? $appt->technician->name : 'No preference' }}</em>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
