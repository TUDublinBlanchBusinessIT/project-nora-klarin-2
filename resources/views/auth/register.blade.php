@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h4>{{ __('Register') }}</h4>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" type="password"
                                   class="form-control"
                                   name="password_confirmation" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('Register as') }}</label>
                            <div class="d-flex gap-3">

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="role"
                                           id="role_customer"
                                           value="customer"
                                           {{ old('role', 'customer') === 'customer' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_customer">
                                        Customer
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="role"
                                           id="role_admin"
                                           value="admin"
                                           {{ old('role') === 'admin' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="role_admin">
                                        Employee
                                    </label>
                                </div>

                            </div>
                            @error('role')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a class="small text-decoration-none" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
