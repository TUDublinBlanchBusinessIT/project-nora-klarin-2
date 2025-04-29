@extends('layouts.app')

@section('content')
<h1>My Appointments</h1>

@if($appointments->isEmpty())
  <p>You have no appointments. <a href="{{ route('appointments.create') }}">Book one</a>.</p>
@else
  <ul>
    @foreach($appointments as $a)
      <li>
        {{ $a->service->name }}
        — {{ \Carbon\Carbon::parse($a->appointment_date)->format('d M Y, H:i') }}
      </li>
    @endforeach
  </ul>
@endif
@endsection
