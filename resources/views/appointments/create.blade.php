@extends('layouts.app')

@section('content')
<div class="container my-5">
  <h1>Book an Appointment</h1>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('appointments.store') }}" method="POST">
    @csrf

    <!-- Service -->
    <div class="mb-3">
      <label for="service_id" class="form-label">Service</label>
      <select name="service_id" id="service_id" class="form-select" required>
        <option value="">-- Choose a service --</option>
        @foreach($services as $s)
          <option value="{{ $s->id }}" {{ old('service_id') == $s->id ? 'selected' : '' }}>
            {{ $s->name }} — €{{ number_format($s->price,2) }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Date & Time -->
    <div class="mb-3">
      <label for="appointment_date" class="form-label">Date & Time</label>
      <input type="datetime-local"
             name="appointment_date"
             id="appointment_date"
             class="form-control"
             value="{{ old('appointment_date') }}"
             required>
    </div>

    <!-- Technician (inside the form!) -->
    <div class="mb-3">
      <label for="technician_id" class="form-label">Preferred Technician (optional)</label>
      <select name="technician_id" id="technician_id" class="form-select">
        <option value="">No preference</option>
        @foreach($technicians as $tech)
          <option value="{{ $tech->id }}" {{ old('technician_id') == $tech->id ? 'selected' : '' }}>
            {{ $tech->name }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Notes -->
    <div class="mb-3">
      <label for="notes" class="form-label">Additional Notes (optional)</label>
      <textarea name="notes" id="notes" class="form-control" rows="3">{{ old('notes') }}</textarea>
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary">Book Appointment</button>
  </form>
</div>
@endsection
