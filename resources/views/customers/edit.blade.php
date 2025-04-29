@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Edit Customer</h1>
    </section>
    <div class="content">
        @include('basic-template::common.errors') <!-- Or replace with a custom error block -->

        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                {!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'patch']) !!}

                        
                        @include('customers.fields') <!-- Ensure this file exists -->

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
