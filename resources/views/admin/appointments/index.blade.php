@extends('layouts.app')

@section('content')
<div class="container my-5">
  <h1>All Appointments</h1>

  @if($appointments->isEmpty())
    <p>No appointments found.</p>
  @else
    <table class="table table-bordered table-striped">
      <thead class="thead-light">
        <tr>
          <th>ID</th>
          <th>Customer</th>
          <th>Service</th>
          <th>Date & Time</th>
          <th>Technician</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @foreach($appointments as $appt)
        <tr>
          <td>{{ $appt->id }}</td>
          <td>{{ $appt->user->name }}</td>
          <td>{{ $appt->service->name }}</td>
          <td>{{ \Carbon\Carbon::parse($appt->appointment_date)->format('d M Y, H:i') }}</td>
          <td>{{ $appt->technician ? $appt->technician->name : 'No preference' }}</td>
          <td>
            <a href="{{ route('appointments.edit', $appt) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('appointments.destroy', $appt) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger"
                      onclick="return confirm('Delete this appointment?')">
                Delete
              </button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
