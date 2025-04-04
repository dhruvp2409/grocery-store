@extends('layout.admin')
@section('title', 'Admin Report')
@section('styles')
<style>
    /* General Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    /* Reports Section */
    .reports {
        max-width: 1100px;
        margin: 50px auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .reports .title {
        text-align: center;
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    /* Box Container */
    .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 10px;
    }

    /* Individual Box Styling */
    .box {
        background: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: 0.3s ease-in-out;
        position: relative;
    }

    .box:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }

    .box h3 {
        font-size: 22px;
        color: #333;
        margin-bottom: 10px;
    }

    .box p {
        font-size: 16px;
        color: #666;
        margin-bottom: 15px;
    }

    /* Buttons */
    .btn {
        display: inline-block;
        padding: 10px 15px;
        font-size: 14px;
        font-weight: bold;
        color: #ffffff;
        background: linear-gradient(45deg, #007bff, #00c6ff);
        border-radius: 25px;
        text-decoration: none;
        transition: 0.3s ease-in-out;
    }

    .btn:hover {
        background: linear-gradient(45deg, #0056b3, #008cff);
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
    }
</style>
@endsection
@section('content')
<section class="reports">

    <h1 class="title">Reports</h1>

    <div class="box-container">

        <div class="box">
            <h3>User Activities</h3>
            <p>View user activities</p>
            <a href="{{ route('admin.user-activities-report') }}" class="btn">View User Activities</a>
        </div>

        <div class="box">
            <h3>Order Summary</h3>
            <p>View order summary</p>
            <a href="{{ route('admin.order-summary-report') }}" class="btn">View Order Summary</a>
        </div>

        <div class="box">
            <h3>Product Sales</h3>
            <p>View product sales</p>
            <a href="{{ route('admin.product-sales-report') }}" class="btn">View Product Sales</a>
        </div>

        <div class="box">
            <h3>Top Selling Products</h3>
            <p>View products with highest sales</p>
            <a href="top_selling_products.php" class="btn">View Top Selling Products</a>
        </div>

    </div>

</section>
@endsection
