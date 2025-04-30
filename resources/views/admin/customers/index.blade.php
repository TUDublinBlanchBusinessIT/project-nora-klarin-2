@extends('layouts.app')

@section('content')
<div class="container my-5">
  <h1>All Customers</h1>

  @if($customers->isEmpty())
    <p>No customers found.</p>
  @else
    <table class="table table-bordered table-striped">
      <thead class="thead-light">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
      @foreach($customers as $customer)
        <tr>
          <td>{{ $customer->id }}</td>
          <td>{{ $customer->name }}</td>
          <td>{{ $customer->email }}</td>
        </tr>
      @endforeach
      </tbody>
    </table>
  @endif
</div>
@endsection
