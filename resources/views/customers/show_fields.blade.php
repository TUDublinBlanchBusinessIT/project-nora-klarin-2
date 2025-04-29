<!-- Firstname Field -->
<div class="form-group">
    {!! Form::label('firstname', 'Firstname:') !!}
    <p>{!! $customer->firstname !!}</p>
</div>

<!-- Lastname Field -->
<div class="form-group">
    {!! Form::label('lastname', 'Lastname:') !!}
    <p>{!! $customer->lastname !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $customer->email !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $customer->phone !!}</p>
</div>

