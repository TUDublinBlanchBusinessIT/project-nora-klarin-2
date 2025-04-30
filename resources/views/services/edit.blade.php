@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Edit Service</h1>

    <form action="{{ route('services.update', $service) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', $service->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (€)</label>
            <input type="number" name="price" id="price" class="form-control" 
                   value="{{ old('price', $service->price) }}" min="0" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
        <a href="{{ route('services.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
