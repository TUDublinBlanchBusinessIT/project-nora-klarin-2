@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Technicians</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('technicians.create') }}" class="btn btn-primary mb-3">
        Add Technician
    </a>

    @if ($technicians->count())
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($technicians as $technician)
                    <tr>
                        <td>{{ $technician->name }}</td>
                        <td>{{ $technician->email }}</td>
                        <td>{{ $technician->phone }}</td>
                        <td>
                            <a href="{{ route('technicians.edit', $technician->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('technicians.destroy', $technician->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Are you sure you want to delete this technician?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No technicians found.</p>
    @endif
</div>
@endsection
