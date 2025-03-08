@extends('layout.front')
@section('title', 'Quick View')
@section('content')
    <section class="quick-view">

        <h1 class="title">Quick View</h1>

        <form action="{{ route('add-to-cart') }}" class="box" method="POST">
            @csrf
            <div class="price">₹<span>{{ $product->price }}</span>/-</div>
            <img src="{{ asset('storage/' . $product->image) }}" alt="">
            <div class="name">{{ $product->name }}</div>
            <div class="details">{{ $product->description }}</div>
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="product_name" value="{{ $product->name }}">
            <input type="hidden" name="product_price" value="{{ $product->price }}">
            <input type="hidden" name="product_image" value="{{ $product->image }}">
            <input type="number" min="1" value="1" name="product_qty" class="qty">
            <input type="submit" value="add to wishlist" class="option-btn" formaction="{{ route('add-to-wishlist') }}">
            <input type="submit" value="add to cart" class="btn">
        </form>

    </section>
@endsection
