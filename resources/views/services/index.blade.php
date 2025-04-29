@extends('layouts.app')

@section('content')
<h1>Our Services</h1>
@if($services->isEmpty())
  <p>No services available yet.</p>
@else
  <ul>
    @foreach($services as $service)
      <li>{{ $service->name }} — €{{ $service->price }}</li>
    @endforeach
  </ul>
@endif

@can('admin')
  <a href="{{ route('services.create') }}" class="btn btn-primary">Add New Service</a>
@endcan
@endsection
