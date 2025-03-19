@extends('layout.front')
@section('title', 'Checkout')
@section('content')
    <section class="display-orders">
        @php
            $cartGrandTotal = 0;
        @endphp

        @if ($carts->count() > 0)
            @foreach ($carts as $item)
                @php
                    $cartTotalPrice = $item->product->price * $item->quantity;
                    $cartGrandTotal += $cartTotalPrice;
                @endphp
                <p>{{ $item->product->name }} <span>({{ '₹' . $item->product->price . '/- x ' . $item->quantity }})</span></p>
            @endforeach
        @else
            <p class="empty">Your cart is empty!</p>
        @endif

        <div class="grand-total">Grand Total : <span>₹{{ $cartGrandTotal }}/-</span></div>
    </section>

    <section class="checkout-orders">
        <form action="{{ route('place-order') }}" method="POST" id="order-form">
            @csrf

            <h3>Place Your Order</h3>

            <div class="flex">
                <div class="inputBox">
                    <span>Your Name :</span>
                    <input type="text" name="name" id="name" placeholder="Enter Your Name" class="box"
                        required>
                </div>
                <div class="inputBox">
                    <span>Your Number :</span>
                    <input type="text" name="phone" id="phone" placeholder="Enter Your Number" class="box"
                        minlength="10" maxlength="10" required>
                </div>
                <div class="inputBox">
                    <span>Your Email :</span>
                    <input type="email" name="email" id="email" placeholder="Enter Your Email" class="box"
                        required>
                </div>
                <div class="inputBox">
                    <span>Payment Method :</span>
                    <select name="payment_method" class="box" id="payment_method" required>
                        <option value="1">Cash on Delivery</option>
                        <option value="2">Online Payment</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Address Line 01 :</span>
                    <input type="text" name="flat" id="flat" placeholder="e.g. Flat Number" class="box"
                        required>
                </div>
                <div class="inputBox">
                    <span>Address Line 02 :</span>
                    <input type="text" name="street" id="street" placeholder="e.g. Street Name" class="box"
                        required>
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" name="city" id="city" placeholder="e.g. Mumbai" class="box" required>
                </div>
                <div class="inputBox">
                    <span>State :</span>
                    <input type="text" name="state" id="state" placeholder="e.g. Maharashtra" class="box"
                        required>
                </div>
                <div class="inputBox">
                    <span>Country :</span>
                    <input type="text" name="country" id="country" placeholder="e.g. India" class="box" required>
                </div>
                <div class="inputBox">
                    <span>Pin Code :</span>
                    <input type="text" minlength="6" maxlength="6" name="pin_code" id="pin_code" placeholder="e.g. 123456"
                        class="box" required>
                </div>
            </div>

            <button type="submit" id="razorpay-button"
                class="btn {{ $cartGrandTotal > 1 ? '' : 'disabled' }}" style="display: none;">Pay with Razorpay</button>
            <input type="submit" id="place-order-button"
                class="btn {{ $cartGrandTotal > 1 ? '' : 'disabled' }}" value="Place order">
        </form>
    </section>
@endsection
@section('script')
<script>
    document.getElementById('payment_method').addEventListener('change', function() {
       if (this.value == '2') {
          document.getElementById('place-order-button').style.display = 'none';
          document.getElementById('razorpay-button').style.display = 'block';
       } else {
          document.getElementById('place-order-button').style.display = 'block';
          document.getElementById('razorpay-button').style.display = 'none';
       }
    });
</script>
@endsection
