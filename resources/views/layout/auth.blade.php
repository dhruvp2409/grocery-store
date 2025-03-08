<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href={{ asset('css/components.css') }}>

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

    <section class="form-container">
        @yield('content')
    </section>
</body>

</html>
