@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Our Services</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($services as $service)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{{ $service->description }}</p>
                        <p class="card-text fw-bold text-success">€{{ number_format($service->price, 2) }}</p>

                        @auth
                            @if(auth()->user()->role === 'admin')
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>

                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this service?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <p>No services available at the moment.</p>
        @endforelse
    </div>

    @auth
        @if(auth()->user()->role === 'admin')
            <div class="text-end mt-4">
                <a href="{{ route('services.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Add New Service
                </a>
            </div>
        @endif
    @endauth
</div>
@endsection
