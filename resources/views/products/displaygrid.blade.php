@extends('layouts.app')
@section('content')

<div class='container'>
    <h1 class="mb-4">Our Vouchers</h1>

    @php
$cart = session()->get('cart');
$cart_count = $cart ? array_sum(array_column($cart, 'quantity')) : 0;
@endphp

<div class="alert alert-info">
    <strong>Cart:</strong> You have {{ $cart_count }} item(s) in your cart.
</div>


    <div class='d-flex flex-wrap align-content-start bg-light'> 
        @foreach($products as $product) 
            <div class="p-2 border col-4 g-3"> 
                <div class="card text-center h-100"> 
                    <div class="card-header">
                        <h5>{{ $product->name }}</h5>
                    </div>

                    <div class="card-body">
                        <img style="width:65%; height:200px;" class="mx-auto d-block mb-2" src="{{ asset('/img/' . $product->image) }}" alt="{{ $product->name }}"/>
                        <p>{{ $product->description }}</p>
                        <p><strong>€{{ number_format($product->price, 2) }}</strong></p>
                    </div>

                    <div class="card-footer">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success mx-auto d-block">Add To Cart</button>
                    </form>

                    </div>
                </div>			
            </div> 
        @endforeach
    </div>

</div>

@endsection
