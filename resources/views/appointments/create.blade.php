@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Appointment
        </h1>
    </section>
    <div class="content">
        @include('basic-template::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'appointments.store']) !!}

                    <div class="form-group col-sm-6">
                        {!! Form::label('appointment_date', 'Appointment Date:') !!}
                        {!! Form::text('appointment_date', null, ['class' => 'form-control', 'id' => 'appointment_date', 'placeholder' => 'Select Appointment Date']) !!}
                    </div>


                        <!-- Service Dropdown -->
                        <div class="form-group">
                            {!! Form::label('service_id', 'Service') !!}
                            {!! Form::select('service_id', $services->pluck('name', 'id'), null, ['class' => 'form-control', 'placeholder' => 'Select Service', 'required' => 'required']) !!}
                        </div>

                        <!-- Customer Name Input -->
                        <div class="form-group">
                            {!! Form::label('customer_name', 'Customer Name') !!}
                            {!! Form::text('customer_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            {!! Form::submit('Create Appointment', ['class' => 'btn btn-primary']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
<script>
    $(function() {
        $('#appointment_date').datepicker({
            dateFormat: 'yy-mm-dd', // Set the date format
            minDate: 0 // Prevent selecting past dates
        });
    });
</script>
@endpush

@endsection
