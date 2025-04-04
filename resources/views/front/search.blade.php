@extends('layout.front')
@section('title', 'Search Page')
@section('content')
    <section class="search-form">
        <form action="{{ route('search-products') }}" method="POST">
            @csrf
            <input type="text" class="box" name="search_box" placeholder="Search Products..." required>
            <input type="submit" class="btn">
        </form>
    </section>

    <section class="products" style="padding-top: 0; min-height:100vh;">
        <div class="box-container">
            @if (isset($products) && !empty($products))
                @if ($products->count() > 0)
                    @foreach ($products as $product)
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
                            @if ($product->stock == 0)
                                <p class="empty">Out Of Stock</p>;
                            @else
                                <input type="number" min="1" value="1" name="product_qty" class="qty">
                            @endif
                            <input type="submit" value="add to wishlist" class="option-btn" formaction="{{ route('add-to-wishlist') }}">
                            <input type="submit" value="add to cart" class="btn {{ $product->stock == 0 ? 'disabled' : '' }}">
                        </form>
                    @endforeach
                @else
                    <p class="empty">No result found!</p>
                @endif
            @endif
        </div>
    </section>
@endsection
