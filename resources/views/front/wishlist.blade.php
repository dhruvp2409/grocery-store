@extends('layout.front')
@section('title', 'Wishlist')
@section('content')
    <section class="wishlist">

        <h1 class="title">Products Added</h1>

        <div class="box-container">
            @php
                $grand_total = 0;
            @endphp
            @if (count($wishlists) > 0)
                @foreach ($wishlists as $wishlist)
                    <form action="{{ route('add-to-cart') }}" method="POST" class="box">
                        @csrf
                        <a href="#" class="fas fa-times" onclick="return confirm('Delete this from wishlist?');"></a>
                        <a href="{{ route('product-details', $wishlist->product->id) }}" class="fas fa-eye"></a>
                        <img src="{{ asset('storage/' . $wishlist->product->image) }}" alt="">
                        <div class="name">{{ $wishlist->product->name }}</div>
                        <div class="price">₹{{ $wishlist->product->price }}/-</div>
                        <input type="number" min="1" value="1" class="qty" name="product_qty">
                        <input type="hidden" name="product_id" value="{{ $wishlist->product->id }}">
                        <input type="hidden" name="product_name" value="{{ $wishlist->product->name }}">
                        <input type="hidden" name="product_price" value="{{ $wishlist->product->price }}">
                        <input type="hidden" name="product_image" value="{{ $wishlist->product->image }}">
                        <input type="submit" value="add to cart" class="btn">
                    </form>
                    @php
                        $grand_total += $wishlist->product->price;
                    @endphp
                @endforeach
            @else
                <p class="empty">your wishlist is empty</p>';
            @endif
        </div>

        <div class="wishlist-total">
            <p>Grand Total : <span>₹{{ $grand_total }}/-</span></p>
            <a href="{{ route('product-list') }}" class="option-btn">Continue Shopping</a>
            <a href="wishlist.php?delete_all" class="delete-btn {{ $grand_total > 1 ? '' : 'disabled' }}">Delete All</a>
        </div>

    </section>
@endsection
