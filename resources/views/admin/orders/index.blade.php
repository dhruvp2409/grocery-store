@extends('layout.admin')
@section('title', 'Orders')
<section class="placed-orders">

    <h1 class="title">placed orders</h1>

    <div class="box-container">
        @if (count($orders)>0)
            @foreach ($orders as $k => $order)
                <div class="box">
                    <p> user id : <span>{{ $order->user_id }}</span> </p>
                    <p> placed on : <span>{{ $order->created_at }}</span> </p>
                    <p> name : <span>{{ $order->name }}</span> </p>
                    <p> email : <span>{{ $order->email }}</span> </p>
                    <p> number : <span>{{ $order->phone }}</span> </p>
                    <p> address : <span>{{ $order->address }}</span> </p>
                    <p> total products : <span>{{ $order->total_products }}</span> </p>
                    <p> total price : <span>₹{{ $order->total_price }}/-</span> </p>
                    <p> payment method : <span>{{ $order->payment_method==1 ? 'cash on delivery' : 'online payment' }}</span> </p>
                    <form action="" method="POST">
                        <input type="hidden" name="order_id" value="<?= $fetch_orders['id'] ?>">
                        <select name="update_payment" class="drop-down">
                            <option value="" selected disabled><?= $fetch_orders['payment_status'] ?></option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" name="update_order" class="option-btn" value="udate">
                            <a href="admin_orders.php?delete=<?= $fetch_orders['id'] ?>" class="delete-btn"
                                onclick="return confirm('delete this order?');">delete</a>
                        </div>
                    </form>
                </div>
            @endforeach
        @else
            <p class="empty">no orders placed yet!</p>
        @endif
    </div>

</section>
@endsection
