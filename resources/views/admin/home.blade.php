@extends('layout.admin')
@section('title','Admin Page')
@section('content')
    <section class="dashboard">
            <h1 class="title">dashboard</h1>
            <div class="box-container">
                <div class="box">
                    <h3>$0/-</h3>
                    <p>total pendings</p>
                    <a href="admin_orders.php" class="btn">see orders</a>
                </div>

                <div class="box">
                    <h3>$0/-</h3>
                    <p>completed orders</p>
                    <a href="admin_orders.php" class="btn">see orders</a>
                </div>

                <div class="box">
                    <h3>0</h3>
                    <p>orders placed</p>
                    <a href="admin_orders.php" class="btn">see orders</a>
                </div>

                <div class="box">
                    <h3>0</h3>
                    <p>products added</p>
                    <a href="admin_products.php" class="btn">see products</a>
                </div>

                <div class="box">
                    <h3>0</h3>
                    <p>total users</p>
                    <a href="admin_users.php" class="btn">see accounts</a>
                </div>

                <div class="box">
                    <h3>0</h3>
                    <p>total admins</p>
                    <a href="admin_users.php" class="btn">see accounts</a>
                </div>

                <div class="box">
                    <h3>0</h3>
                    <p>total accounts</p>
                    <a href="admin_users.php" class="btn">see accounts</a>
                </div>

                <div class="box">
                    <h3>0</h3>
                    <p>total messages</p>
                    <a href="admin_contacts.php" class="btn">see messages</a>
                </div>

            </div>

    </section>
@endsection
