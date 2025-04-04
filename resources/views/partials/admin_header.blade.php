<header class="header">

    <div class="flex">

        <a href="{{ route('admin.home') }}" class="logo">Admin<span>Panel</span></a>

        <nav class="navbar">
            <a href="{{ route('admin.home') }}">Home</a>
            <a href="{{ route('admin.categories.index') }}">Categories</a>
            <a href="{{ route('admin.products.index') }}">Products</a>
            <a href="{{ route('admin.orders.index') }}">Orders</a>
            <a href="{{ route('admin.users.index') }}">Users</a>
            <a href="{{ route('admin.inquiries.index') }}">Inquiries</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>

        <div class="profile">
            @if (!empty(auth()->user()->image))
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
            @else
                <img src="{{ asset('images/user-pic.jpg') }}" alt="">
            @endif
            <p>{{ auth()->user()->name }}</p>
            <a href="{{ route('profile') }}" class="btn">update profile</a>
            <a href="{{ route('logout') }}" class="delete-btn">logout</a>
            {{-- <div class="flex-btn">
                <a href="login.php" class="option-btn">login</a>
                <a href="register.php" class="option-btn">register</a>
            </div> --}}
        </div>

    </div>

</header>
