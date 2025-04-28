@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Appointments</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('appointments.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <!-- Start of the table where appointments will be listed -->
                <table class="table table-responsive" id="appointments-table">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Customer</th>
                            <th>Appointment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->service->name }}</td>
                            <td>{{ $appointment->customer->firstname }} {{ $appointment->customer->lastname }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d-m-Y H:i') }}</td> <!-- Format the date -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
