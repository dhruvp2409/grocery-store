<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    @if ($errors->count() > 0)
        @foreach ($errors->all() as $error)
            <div class="message">
                <span>{{ $error }}</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
        @endforeach
    @endif
    @if (session('error'))
        <div class="message">
            <span>{{ session('error') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endif
    @if (session('success'))
        <div class="message">
            <span>{{ session('success') }}</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
        </div>
    @endif
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
                <a href="{{ route('wishlist') }}"><i class="fas fa-heart"></i><span>(0)</span></a>
                <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i><span>(1)</span></a>
            </div>
            <div class="profile">
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
                <p>{{auth()->user()->name}}</p>
                <a href="{{ route('profile') }}" class="btn">update profile</a>
                <a href="logout.php" class="delete-btn">logout</a>
                <div class="flex-btn">
                    <a href="login.php" class="option-btn">login</a>
                    <a href="register.php" class="option-btn">register</a>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    {{-- <div class="pagination">
        <a href="?page=1" class="prev-btn"><i class="fa fa-caret-left"></i></a>
        <a href="?page=1" class="page-link active">1</a>
        <a href="?page=2" class="page-link">2</a>
        <a href="?page=3" class="page-link">3</a>
        <a href="?page=4" class="page-link">4</a>
        <span class="dots">...</span>
        <a href="?page=10" class="page-link">10</a>
        <a href="?page=2" class="next-btn"><i class="fas fa-caret-right"></i></a>
    </div> --}}
    <footer class="footer">

        <section class="box-container">

           <div class="box">
              <h3>Quick Links</h3>
              <a href="home.php"> <i class="fas fa-angle-right"></i> Home</a>
              <a href="shop.php"> <i class="fas fa-angle-right"></i> Shop</a>
              <a href="about.php"> <i class="fas fa-angle-right"></i> About</a>
              <a href="contact.php"> <i class="fas fa-angle-right"></i> Contact</a>
           </div>

           <div class="box">
              <h3>Extra Links</h3>
              <a href="cart.php"> <i class="fas fa-angle-right"></i> Cart</a>
              <a href="wishlist.php"> <i class="fas fa-angle-right"></i> Wishlist</a>
              <a href="login.php"> <i class="fas fa-angle-right"></i> Login</a>
              <a href="register.php"> <i class="fas fa-angle-right"></i> Register</a>
           </div>

           <div class="box">
              <h3>Contact Info</h3>
              <p> <i class="fas fa-phone"></i> +123-456-7890 </p>
              <p> <i class="fas fa-phone"></i> +111-222-3333 </p>
              <p> <i class="fas fa-envelope"></i> janvipatel@gmail.com </p>
              <p> <i class="fas fa-map-marker-alt"></i> gujrat, india  </p>
           </div>

           <div class="box">
              <h3>Follow Us</h3>
              <a href="#"> <i class="fab fa-facebook-f"></i> Facebook </a>
              <a href="#"> <i class="fab fa-twitter"></i> Twitter </a>
              <a href="#"> <i class="fab fa-instagram"></i> Instagram </a>
              <a href="#"> <i class="fab fa-linkedin"></i> Linkedin </a>
           </div>

        </section>

        <p class="credit">  <span>Thank You For Visit Our Website</span> | All Rights Reserved! </p>

     </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    @yield('script')
</body>

</html>
