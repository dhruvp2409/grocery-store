@extends('layout.front')
@section('title', 'About')
@section('content')
    <section class="placed-orders">

        <h1 class="title">placed orders</h1>

        <div class="box-container">

            <div class="box">
                <p> placed on : <span></span> </p>
                <p> name : <span></span> </p>
                <p> number : <span></span> </p>
                <p> email : <span></span> </p>
                <p> address : <span></span> </p>
                <p> payment method : <span></span> </p>
                <p> your orders : <span></span> </p>
                <p> total price : <span>$/-</span> </p>
                <p> payment status : <span style="color:green">paid</span> </p>
            </div>

        {{-- <p class="empty">no orders placed yet!</p> --}}

        </div>

    </section>
@endsection
