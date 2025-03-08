@extends('layout.front')
@section('title', 'Home Page')
@section('content')
    <div class="home-bg">
        <section class="home">
            <div class="content">
                <span>Don't Panic, Go Organice</span>
                <h3>Reach For A Healthier You With Organic Foods</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto natus culpa officia quasi, accusantium
                    explicabo?</p>
                <a href="{{ route('about') }}" class="btn">about us</a>
            </div>
        </section>
    </div>

    <section class="home-category">
        <h1 class="title">shop by category</h1>
        <div class="box-container">
            <div class="box">
                <img src="images/cat-1.png" alt="">
                <h3>fruits</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                <a href="category.php?category=fruits" class="btn">fruits</a>
            </div>
            <div class="box">
                <img src="images/cat-2.png" alt="">
                <h3>meat</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                <a href="category.php?category=meat" class="btn">meat</a>
            </div>
            <div class="box">
                <img src="images/cat-3.png" alt="">
                <h3>vegitables</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                <a href="category.php?category=vegitables" class="btn">vegitables</a>
            </div>
            <div class="box">
                <img src="images/cat-4.png" alt="">
                <h3>fish</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem, quaerat.</p>
                <a href="category.php?category=fish" class="btn">fish</a>
            </div>
            @foreach ($categories as $category)
                <div class="box">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="">
                    <h3>{{ $category->title }}</h3>
                    <p>{{ $category->description }}</p>
                    <a href="{{ route('category', $category->slug) }}" class="btn">{{ $category->title }}</a>
                </div>
            @endforeach
        </div>
    </section>

    <section class="products">
        <h1 class="title">Latest Products</h1>
        <div class="box-container">
            <form action="" class="box" method="POST">
                <div class="price">$<span>400</span>/-</div>
                <a href="view_page.php?pid=2" class="fas fa-eye"></a>
                <input type="number" min="1" value="1" name="p_qty" class="qty">
                <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist">
                <input type="submit" value="add to cart" class="btn" name="add_to_cart">
            </form>
            @foreach ($latest_products as $product)
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
        </div>
    </section>
@endsection
