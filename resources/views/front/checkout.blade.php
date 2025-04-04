@extends('layout.front')
@section('title', 'Checkout')
@section('content')
    <section class="display-orders">
        @php
            $cartGrandTotal = 0;
        @endphp

        @if ($carts->count() > 0)
            @foreach ($carts as $item)
                @if ($item->product->stock > 0)
                    @php
                        $cartTotalPrice = $item->product->price * $item->quantity;
                        $cartGrandTotal += $cartTotalPrice;
                    @endphp
                    <p>{{ $item->product->name }} <span>({{ '₹' . $item->product->price . '/- x ' . $item->quantity }})</span></p>
                @endif
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

            <button type="button" id="razorpay-button"
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
     document.getElementById('razorpay-button').addEventListener('click', async () => {
        // e.preventDefault(); // Prevents form submission
        let form = document.getElementById('order-form'); // Replace with your actual form ID
         if (!form.checkValidity()) {
            form.reportValidity(); // Shows validation messages
         } else {
            const formData = new FormData(form);

            // Prepare form data for redirection
            const formObject = {};
            formData.forEach((value, key) => {
                formObject[key] = value;
            });

            // Fetch the order ID from the server
            const response = await fetch("{{ route('create-razorpay-order') }}", {
                method: "POST",
                body:JSON.stringify({                         // Convert data to JSON format
                    amount: "{{ $cartGrandTotal }}"            // Pass the amount as data
                }),
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "amount": "{{ $cartGrandTotal }}",
                    "Content-Type": "application/json"
                }
            });

            const data = await response.json();

            if (data.success) {
                const urls = "{{ route('success') }}";

                var options = {
                    "key": "rzp_test_Lc1AqxPfJ51UeX",  // Razorpay Key
                    "amount": data.amount * 100,      // Amount in paise
                    "currency": "INR",
                    "name": "The Indian Supermart",
                    "description": "Order Payment",
                    "order_id": data.order_id,        // Use the fetched order ID
                    "handler": function(response) {
                        for (var key in formObject) {
                            if (formObject.hasOwnProperty(key)) {
                                var hiddenField = document.createElement("input");
                                hiddenField.type = "hidden";
                                hiddenField.name = key;
                                hiddenField.value = formObject[key];
                                form.appendChild(hiddenField);
                            }
                        }
                        document.body.appendChild(form);
                        form.submit();

                        // window.location.href = "billing";
                    },
                    "notes": {
                        "address": "Razorpay Corporate Office"
                    },
                    "theme": {
                        "color": "#3399cc"
                    }
                };

                var rzp1 = new Razorpay(options);
                rzp1.open();

            }
        }
    });
</script>
@endsection
