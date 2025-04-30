@extends('layouts.app')

@section('content')
<div class="container my-5">
  <h1>Edit Appointment #{{ $appointment->id }}</h1>

  <form action="{{ route('appointments.update', $appointment) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="user_id" class="form-label">Customer</label>
      <select name="user_id" id="user_id" class="form-control" required>
        @foreach($users as $user)
          <option value="{{ $user->id }}"
            {{ $appointment->user_id == $user->id ? 'selected' : '' }}>
            {{ $user->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="service_id" class="form-label">Service</label>
      <select name="service_id" id="service_id" class="form-control" required>
        @foreach($services as $service)
          <option value="{{ $service->id }}"
            {{ $appointment->service_id == $service->id ? 'selected' : '' }}>
            {{ $service->name }} — €{{ number_format($service->price,2) }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="appointment_date" class="form-label">Date & Time</label>
      <input type="datetime-local"
             name="appointment_date"
             id="appointment_date"
             class="form-control"
             value="{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d\TH:i') }}"
             required>
    </div>

    <button type="submit" class="btn btn-success">Save Changes</button>
    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
