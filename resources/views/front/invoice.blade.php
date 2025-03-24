<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ddd; }
        .invoice-header { text-align: center; }
        .invoice-details { margin-top: 20px; }
        .invoice-footer { margin-top: 20px; text-align: center; }
        .btn-print { background: blue; color: white; padding: 10px; border: none; cursor: pointer; }
    </style>
</head>
<body>

<div class="invoice-container">
    <div class="invoice-header">
        <h1>Invoice</h1>
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Date:</strong> {{ $order->created_at }}</p>
    </div>

    <div class="invoice-details">
        <p><strong>Name:</strong> {{ $order->name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Payment Method:</strong> {{ $order->payment_method==1 ? 'Cash On Delivery' : 'Online Payment' }}</p>
        <p><strong>Total Amount:</strong> ₹{{ $order->total_price }}/-</p>
        <p><strong>Status:</strong> {{ ucfirst($order->payment_status) }}</p>
    </div>

    <div class="invoice-footer">
        <button onclick="window.print()" class="btn-print">Print Invoice</button>
    </div>
</div>

</body>
</html>
