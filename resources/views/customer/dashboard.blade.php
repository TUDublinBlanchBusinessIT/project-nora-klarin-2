@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Hello, {{ auth()->user()->name }}</h1>

    <div class="mb-4">
        <a href="{{ route('appointments.create') }}"
           class="btn btn-primary btn-lg">
            Book a New Appointment
        </a>
    </div>

    <h2 class="mb-3">Your Upcoming Appointments</h2>
    <div class="card mb-4">
        <div class="card-body">
            @if($appointments->isEmpty())
                <p>No upcoming appointments. <a href="{{ route('appointments.create') }}">Book one</a>.</p>
            @else
                <ul class="list-group list-group-flush">
                    @foreach($appointments as $appt)
                        <li class="list-group-item">
                            <strong>{{ $appt->service->name }}</strong> on 
                            <span class="text-muted">{{ \Carbon\Carbon::parse($appt->appointment_date)->format('d M Y, H:i') }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <h2 class="mb-3">Our Services</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Service</th>
                        <th>Price (€)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>€{{ number_format($service->price, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
