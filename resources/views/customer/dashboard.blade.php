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
                    @foreach($past as $appointment)
                        <li class="list-group-item d-flex flex-column align-items-start">
                            <div class="w-100 d-flex justify-content-between">
                                <div>
                                    <strong>{{ $appointment->service->name }}</strong>
                                    <span class="text-muted">
                                        on {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y, H:i') }}
                                    </span>
                                </div>
                                <div>
                                    Technician: <em>{{ $appointment->technician ? $appointment->technician->name : 'No preference' }}</em>
                                </div>
                            </div>

                            <p class="mb-2"><strong>Technician avg rating:</strong> {{ number_format($appointment->technician->averageRating(), 1) }} ★</p>

                            @if(!$appointment->review)
                                <form action="{{ route('reviews.store') }}" method="POST" class="mt-2 w-100">
                                    @csrf
                                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                    <input type="hidden" name="technician_id" value="{{ $appointment->technician_id }}">

                                    <label for="rating">Rating</label>
                                    <select name="rating" required class="form-select mb-2">
                                        <option value="">Choose rating</option>
                                        @for($i=5; $i>=1; $i--)
                                            <option value="{{ $i }}">{{ $i }} ★</option>
                                        @endfor
                                    </select>

                                    <label for="comment">Comment (optional)</label>
                                    <textarea name="comment" class="form-control mb-2"></textarea>

                                    <button class="btn btn-primary btn-sm">Submit Review</button>
                                </form>
                            @else
                                <p><strong>Your review:</strong> {{ $appointment->review->rating }} ★ <br> {{ $appointment->review->comment }}</p>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
