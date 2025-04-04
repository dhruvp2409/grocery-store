<header class="header">
    <div class="flex">
        <a href="{{ route('home') }}" class="logo"><i class="fa fa-shopping-basket"></i>THE INDIAN SUPER MART<span></span></a>
        <nav class="navbar">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('product-list') }}">Shop</a>
            <a href="{{ route('orders') }}">Orders</a>
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('contact') }}">Contact</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
            <a href="{{ route('search-page') }}" class="fas fa-search"></a>
            <a href="{{ route('wishlist') }}"><i class="fas fa-heart"></i><span>({{$wishlist_counts}})</span></a>
            <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i><span>({{$cart_counts}})</span></a>
        </div>
        <div class="profile">
            @if (!empty(auth()->user()->image))
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
            @else
                <img src="{{ asset('images/user-pic.jpg') }}" alt="">
            @endif
            <p>{{auth()->user()->name}}</p>
            <a href="{{ route('profile') }}" class="btn">update profile</a>
            <a href="{{ route('logout') }}" class="delete-btn">logout</a>
            {{-- <div class="flex-btn">
                <a href="login.php" class="option-btn">login</a>
                <a href="register.php" class="option-btn">register</a>
            </div> --}}
        </div>
    </div>
</header>
