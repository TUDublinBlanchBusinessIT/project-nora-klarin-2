@extends('layouts.app')

@section('content')
<h1>Book an Appointment</h1>

<form action="{{ route('appointments.store') }}" method="POST">
  @csrf
  <label>Service</label>
  <select name="service_id" required>
    @foreach($services as $s)
      <option value="{{ $s->id }}">{{ $s->name }} — €{{ $s->price }}</option>
    @endforeach
  </select>

  <label>Date & Time</label>
  <input type="datetime-local" name="appointment_date" required>

  <button type="submit">Book Now</button>
</form>

<div class="mt-4">
    <x-label for="technician_id" :value="__('Preferred Technician (optional)')" />
    <select name="technician_id" id="technician_id" class="form-select">
        <option value="">No preference</option>
        @foreach($technicians as $technician)
            <option value="{{ $technician->id }}" {{ old('technician_id') == $technician->id ? 'selected' : '' }}>
                {{ $technician->name }}
            </option>
        @endforeach
    </select>
</div>

@endsection


