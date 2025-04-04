@extends('layout.admin')
@section('title', 'Product Sales Report')
@section('styles')
    <style>
        /* Table Styling */
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
    <section class="product-sales">

        <h1 class="title">Product Sales Report</h1>

        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Total Sold</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->title }}</td>
                        <td>₹{{ $product->price }}/-</td>
                        <td>{{ $product->total_sold }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
