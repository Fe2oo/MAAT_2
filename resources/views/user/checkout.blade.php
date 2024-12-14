@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>

        @foreach($cartItems as $cartItem)
            <div>
                <h4>{{ $cartItem->product->name }}</h4>
                <p>Price: ${{ $cartItem->product->price }}</p>
                <p>Quantity: {{ $cartItem->quantity }}</p>
                <p>Total: ${{ $cartItem->product->price * $cartItem->quantity }}</p>
            </div>
        @endforeach

        <form action="{{ route('products.purchase.store') }}" method="POST">
            @csrf
            <!-- Add any necessary fields for shipping and payment details -->
            <button type="submit" class="btn btn-primary">Complete Purchase</button>
        </form>
    </div>
@endsection
