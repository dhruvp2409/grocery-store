@extends('layout.auth')
@section('title','Register')
@section('content')
   <form action="" enctype="multipart/form-data" method="POST">
      @csrf
      <h3>register now</h3>
      <input type="text" name="name" class="box" placeholder="Enter Your Name" value="{{old('name')}}" required>
      <input type="email" name="email" class="box" placeholder="Enter Your Email" value="{{old('email')}}" required>
      <input type="password" name="password" class="box" placeholder="Enter Your Password" minlength="6" required>
      <input type="password" name="confirm_password" class="box" placeholder="Confirm Your Password" minlength="6" required>
      <input type="file" name="image" class="box" required accept="image/jpg, image/jpeg, image/png" >
      <input type="submit" value="register now" class="btn">
      <p>Already Have An Account? <a href="{{route('login')}}">Login Now</a></p>
   </form>
@endsection
