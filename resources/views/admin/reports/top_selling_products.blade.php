@extends('layout.admin')
@section('title', 'User Activities Report')
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
    <section class="top-selling-products">

        <h1 class="title">Top Selling Products</h1>

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
                @if (!empty($products))
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ htmlspecialchars($product->id) }}</td>
                            <td>{{ htmlspecialchars($product->name) }}</td>
                            <td>{{ htmlspecialchars($product->category->title) }}</td>
                            <td>₹{{ htmlspecialchars($product->price) }}/-</td>
                            <td>{{ htmlspecialchars($product->total_sold) }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="text-align: center;">No products found.</td>
                    </tr>
                @endif
            </tbody>
        </table>

    </section>
@endsection
