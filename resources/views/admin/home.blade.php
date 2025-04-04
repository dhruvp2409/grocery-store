@extends('layout.admin')
@section('title','Admin Page')
@section('content')
    <section class="dashboard">
            <h1 class="title">dashboard</h1>
            <div class="box-container">
                <div class="box">
                    <h3>₹{{ $count['pending_orders'] }}/-</h3>
                    <p>Total Pendings</p>
                    <a href="admin_orders.php" class="btn">see orders</a>
                </div>

                <div class="box">
                    <h3>₹{{ $count['completed_orders'] }}/-</h3>
                    <p>Completed Orders</p>
                    <a href="admin_orders.php" class="btn">see orders</a>
                </div>

                <div class="box">
                    <h3>{{ $count['orders'] }}</h3>
                    <p>Orders Placed</p>
                    <a href="admin_orders.php" class="btn">see orders</a>
                </div>

                <div class="box">
                    <h3>{{ $count['products'] }}</h3>
                    <p>Products Added</p>
                    <a href="{{ route('admin.products.index') }}" class="btn">see products</a>
                </div>

                <div class="box">
                    <h3>{{ $count['users'] }}</h3>
                    <p>Total Users</p>
                    <a href="{{ route('admin.user-activities-report') }}" class="btn">see accounts</a>
                </div>

                <div class="box">
                    <h3>{{ $count['inquiries'] }}</h3>
                    <p>Total Messages</p>
                    <a href="{{ route('admin.inquiries.index') }}" class="btn">see messages</a>
                </div>

                <div class="box">
                    <h3> Reports</h3>
                    <p>View Detailed Reports</p>
                    <a href="{{ route('admin.reports') }}" class="btn">Generate Reports</a>
                 </div>

                <div class="box">
                    <h3>₹{{ $count['total_billing'] }}/-</h3>
                    <p>Total Billing Amount</p>
                    <a href="{{ route('admin.billing-report') }}" class="btn">View Billing</a>
                </div>

            </div>

    </section>
@endsection
