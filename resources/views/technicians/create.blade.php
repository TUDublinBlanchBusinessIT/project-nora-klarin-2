@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Technician</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('technicians.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email"
                   name="email"
                   id="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text"
                   name="phone"
                   id="phone"
                   class="form-control"
                   value="{{ old('phone') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create Technician</button>
        <a href="{{ route('technicians.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
</div>
@endsection
