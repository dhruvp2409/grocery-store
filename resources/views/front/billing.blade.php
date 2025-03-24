<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>

	 <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

	<style>
	/* General Page Styling */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Section Styling */
.billing {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.billing .title {
    text-align: center;
    font-size: 24px;
    color: #444;
    font-weight: bold;
    margin-bottom: 20px;
}

/* Grid Layout for Orders */
.box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    padding: 10px;
}

/* Order Box Styling */
.box {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.box:hover {
    transform: scale(1.02);
}

.box h3 {
    font-size: 20px;
    color: #222;
    margin-bottom: 10px;
}

.box p {
    font-size: 14px;
    margin: 5px 0;
    color: #555;
}

/* Button Styling */
.btn {
    display: inline-block;
    text-align: center;
    background: #007bff;
    color: white;
    padding: 8px 15px;
    margin-top: 10px;
    border-radius: 5px;
    font-size: 14px;
    text-decoration: none;
    transition: background 0.3s;
}

.btn:hover {
    background: #0056b3;
}

/* Responsive Design */
@media (max-width: 768px) {
    .box-container {
        grid-template-columns: 1fr;
    }
}
</style>

</head>
<body>

<section class="billing">
    <h1 class="title">Billing & Invoices</h1>

    <div class="box-container">
        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <div class="box">
                    <h3>Order #{{ $order->id }}</h3>
                    <p><strong>Products:</strong> {{ $order->total_products }}</p>

                    <p><strong>Date:</strong> {{ date("d M Y, h:i A", strtotime($order->created_at)) }}</p>
                    <p><strong>Payment Method:</strong> {{ $order->payment_method == 1 ? 'Cash On Delivery' : 'Online Payment' }}</p>
                    <p><strong>Total:</strong> ₹{{ $order->total_price }}/-</p>
                    <p><strong>Status:</strong> {{ ucfirst($order->payment_status) }}</p>

                    <a href="{{ route('invoice',$order->id) }}" class="btn">View Invoice</a>
                </div>
            @endforeach
        @else
            <p class="empty">No orders found.</p>
        @endif
    </div>
</section>

</body>
</html>
