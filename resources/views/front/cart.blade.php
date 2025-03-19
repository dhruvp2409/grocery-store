@extends('layout.front')
@section('title', 'Shopping Cart')
@section('content')
<section class="shopping-cart">
    <h1 class="title">Products Added</h1>

    <div class="box-container">
        @if($carts->isEmpty())
            <p class="empty">Your cart is empty</p>
        @else
            @foreach ($carts as $cart)
                <form action="{{ route('cart.update') }}" method="POST" class="box">
                    @csrf
                    <a href="{{ route('cart.delete', $cart->id) }}" class="fas fa-times"
                       onclick="return confirm('Delete this from cart?');"></a>
                    <a href="{{ route('product-details', $cart->product->slug) }}" class="fas fa-eye"></a>
                    <img src="{{ asset('storage/' . $cart->product->image) }}" alt="">
                    <div class="name">{{ $cart->product->name }}</div>
                    <div class="price">₹{{ $cart->product->price }}/-</div>
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                    <div class="flex-btn">
                        <input type="number" min="1" value="{{ $cart->quantity }}" class="qty" name="p_qty">
                        <input type="submit" value="Update" class="option-btn">
                    </div>
                    <div class="sub-total"> Sub Total : <span>₹{{ $cart->product->price * $cart->quantity }}/-</span> </div>
                </form>
            @endforeach
        @endif
    </div>

    <div class="cart-total">
        <p>Grand Total : <span>₹{{ $grandTotal }}/-</span></p>
        <a href="{{ route('product-list') }}" class="option-btn">Continue Shopping</a>
        <a href="{{ route('cart.deleteAll') }}" class="delete-btn {{ $grandTotal > 0 ? '' : 'disabled' }}">Delete All</a>
        <a href="{{ route('checkout') }}" class="btn {{ $grandTotal > 0 ? '' : 'disabled' }}">Proceed To Checkout</a>
    </div>
</section>
@endsection
