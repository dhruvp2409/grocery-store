@extends('layout.front')
@section('title', 'Shop')
@section('content')
    <section class="p-category">

        <a href="category.php?category=fruits">Fruits</a>
        <a href="category.php?category=vegitables">Vegitables</a>
        <a href="category.php?category=fish">Fish</a>
        <a href="category.php?category=meat">meat</a>
        <a href="category.php?category=masala & dry fruits">Masala & Dry Fruits</a>
        <a href="category.php?category=atta,rice,oil & dals">Atta,Rice,Oil & Dals</a>
        <a href="category.php?category=biscuits & cookies">Biscuits & Cookies</a>
        <a href="category.php?category=tea,coffee & more">Tea,Coffee & More</a>
        <a href="category.php?category=dairy,bread & eggs">Dairy,Bread & Eggs</a>
        <a href="category.php?category=cold drinks & juices">Cold Drinks & Juices</a>
        @foreach ($categories as $category)
            <a href="{{ route('category', $category->slug) }}">{{ $category->title }}</a>
        @endforeach

    </section>

    <section class="products">

        <h1 class="title">Latest Products</h1>

        <div class="box-container">

            @if (count($products) > 0)
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
                        <input type="number" min="1" value="1" name="product_qty" class="qty">
                        <input type="submit" value="add to wishlist" class="option-btn" formaction="{{ route('add-to-wishlist') }}">
                        <input type="submit" value="add to cart" class="btn">                    </form>
                @endforeach
            @else
                <p class="empty">No products available!</p>
            @endif

        </div>

    </section>
    {{ $products->links() }}
@endsection
