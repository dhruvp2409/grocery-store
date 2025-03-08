@extends('layout.front')
@section('title', 'Category')
@section('content')
<section class="products">

    <h1 class="title">Products Categories</h1>

    <div class="box-container">

        @if (count($category->products) > 0)
            @foreach ($category->products as $product)
                <form action="{{ route('add-to-cart') }}" class="box" method="POST">
                    @csrf
                    <div class="price">₹<span>{{ $product->price }}</span>/-</div>
                    <a href="{{ route('product-details',$product->slug) }}" class="fas fa-eye"></a>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="">
                    <div class="name">{{ $product->name }}</div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <input type="hidden" name="product_price" value="{{ $product->price }}">
                    <input type="hidden" name="product_image" value="{{ $product->image }}">
                    <input type="number" min="1" value="1" name="product_qty" class="qty">
                    <input type="submit" value="add to wishlist" class="option-btn" formaction="{{ route('add-to-wishlist') }}">
                    <input type="submit" value="add to cart" class="btn">
                </form>
            @endforeach
        @else
            <p class="empty">No products available!</p>
        @endif

    </div>

 </section>
@endsection
