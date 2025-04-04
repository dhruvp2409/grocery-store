@extends('layout.admin')
@section('title', 'Billing Report')
@section('styles')
<style>
    /* General Styles */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h1.title {
        text-align: center;
        margin: 20px;
        font-size: 2em;
        color: #333;
    }

    section.billing-report {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    .filter-container {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .filter-box {
        width: 23%;
    }

    .filter-box input,
    .filter-box select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em;
    }

    .filter-box input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        cursor: pointer;
        border: none;
    }

    .filter-box input[type="submit"]:hover {
        background-color: #45a049;
    }

    /* Table Styles */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table th,
    table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f1f1f1;
        color: #333;
        font-size: 1.1em;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    table td {
        font-size: 0.95em;
    }

    table td span {
        font-weight: bold;
    }

    /* Empty Row */
    table td[colspan="7"] {
        text-align: center;
        color: #888;
        font-style: italic;
    }

    @media (max-width: 768px) {
        .filter-container {
            flex-direction: column;
        }

        .filter-box {
            width: 100%;
            margin-bottom: 10px;
        }
    }

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
    <section class="billing-report">
        <h1 class="title">Billing Report</h1>

        <!-- Filter Form -->


        <!-- Billing Report Table -->
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Order Status</th>
                    <th>Order Date</th>
                    <th>Products</th> <!-- New Column for Products -->
                </tr>
            </thead>
            <tbody>
                @if (count($billing_report) > 0)
                    @foreach ($billing_report as $report)
                        <tr>
                            <td>{{ $report->name }}</td>
                            <td>{{ $report->email }}</td>
                            <td>{{ $report->address }}</td>
                            <td>₹{{ $report->total_price }}/-</td>
                            <td>{{ $report->payment_method == 1 ? 'Cash On Delivery' : 'Online Payment' }}</td>
                            <td>{{ ucfirst($report->payment_status) }}</td>
                            <td>{{ $report->created_at->format('d-M-Y') }}</td>
                            <td>{{ $report->total_products }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan='8'>No orders found.</td>
                    </tr>
                @endif
            </tbody>
        </table>

    </section>
@endsection
