<!-- Appointment Date Field -->
<div class="form-group">
    {!! Form::label('appointment_date', 'Appointment Date:') !!}
    <p>{!! $appointment->appointment_date !!}</p>
</div>

<!-- Service Id Field -->
<div class="form-group">
    {!! Form::label('service_id', 'Service Id:') !!}
    <p>{!! $appointment->service_id !!}</p>
</div>

<!-- Customer Id Field -->
<div class="form-group">
    {!! Form::label('customer_id', 'Customer Id:') !!}
    <p>{!! $appointment->customer_id !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{!! $appointment->status !!}</p>
</div>

