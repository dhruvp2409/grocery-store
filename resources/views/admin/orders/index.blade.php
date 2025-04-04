@extends('layout.admin')
@section('title', 'Orders')
@section('content')
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
                    <form action="{{ route('admin.orders.update',$order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="payment_status" class="drop-down">
                            <option value="pending" @if ($order->payment_status == 'pending') selected @endif>pending</option>
                            <option value="completed" @if ($order->payment_status == 'completed') selected @endif>completed</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" class="option-btn" value="update">
                            <a href="javascript:void(0)" class="delete-btn"
                                onclick="event.preventDefault(); if(confirm('Delete this order?')) document.getElementById('delete-form-{{ $order->id }}').submit();">
                                Delete
                            </a>
                        </div>
                    </form>
                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: none;" id="delete-form-{{ $order->id }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            @endforeach
        @else
            <p class="empty">no orders placed yet!</p>
        @endif
    </div>
    {{ $orders->links() }}
</section>
@endsection
