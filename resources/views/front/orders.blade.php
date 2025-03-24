@extends('layout.front')
@section('title', 'Orders')
@section('content')
    <section class="placed-orders">

        <h1 class="title">Placed Orders</h1>

        <div class="box-container">
            @if (count($orders) > 0)
                @foreach ($orders as $k => $order)
                    <div class="box">
                        <p> Placed On : <span>{{ date('d-M-Y',strtotime($order->created_at)) }}</span> </p>
                        <p> Name : <span>{{ $order->name }}</span> </p>
                        <p> Number : <span>{{ $order->phone }}</span> </p>
                        <p> Email : <span>{{ $order->email }}</span> </p>
                        <p> Address : <span>{{ $order->address }}</span> </p>
                        <p> Payment Method : <span>{{ $order->payment_method== 1 ? 'Cash On Delivery' : 'Online Payment' }}</span> </p>
                        <p> Your Orders : <span>{{ $order->total_products }}</span> </p>
                        <p> Total Price : <span>₹{{ $order->total_price }}/-</span> </p>
                        <p> Payment Status : <span
                                style="color:{{ $order->payment_status=='pending' ? 'red' : 'green'}}">{{ $order->payment_status }}</span> </p>
                    </div>
                @endforeach
            @else
                <p class="empty">no orders placed yet!</p>
            @endif
        </div>
        {{ $orders->links() }}
    </section>

@endsection
