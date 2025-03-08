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
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">

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

            <a href="admin_page.php" class="logo">Admin<span>Panel</span></a>

            <nav class="navbar">
                <a href="{{ route('admin.home') }}">home</a>
                <a href="{{ route('admin.categories.index') }}">categories</a>
                <a href="{{ route('admin.products.index') }}">products</a>
                <a href="admin_orders.php">orders</a>
                <a href="{{ route('admin.users.index') }}">users</a>
                <a href="{{ route('admin.inquiries.index') }}">inquiries</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <div id="user-btn" class="fas fa-user"></div>
            </div>

            <div class="profile">
                <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
                <p>{{ auth()->user()->name }}</p>
                <a href="{{ route('profile') }}" class="btn">update profile</a>
                <a href="logout.php" class="delete-btn">logout</a>
                {{-- <div class="flex-btn">
                    <a href="login.php" class="option-btn">login</a>
                    <a href="register.php" class="option-btn">register</a>
                </div> --}}
            </div>

        </div>

    </header>
    @yield('content')

    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
