@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Cart</h2>

    @if(empty($detailedCart))
        <div class="alert alert-info">
            Your cart is empty. <a href="{{ route('products.displaygrid') }}">Browse Vouchers</a>
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Voucher</th>
                    <th>Image</th>
                    <th>Price (€)</th>
                    <th>Quantity</th>
                    <th>Subtotal (€)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailedCart as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td><img src="{{ asset('/img/' . $item['image']) }}" width="100"></td>
                        <td>{{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['subtotal'], 2) }}</td>
                    </tr>
                @endforeach
                <tr class="table-secondary fw-bold">
                    <td colspan="4" class="text-end">Total (€)</td>
                    <td>{{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('products.displaygrid') }}" class="btn btn-primary">Continue Shopping</a>
    @endif
</div>
@endsection
