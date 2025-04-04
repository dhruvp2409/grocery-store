@extends('layout.admin')
@section('title', 'Order Summary Report')
@section('styles')
    <style>
        /* Add custom CSS for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
@endsection
@section('content')
    <section class="order-summary">

        <h1 class="title">Order Summary Report</h1>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Total Products</th>
                    <th>Total Price</th>

                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->total_products }}</td>
                        <td>₹{{ $order->total_price }}/-</td>
                        <td>{{ $order->payment_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
