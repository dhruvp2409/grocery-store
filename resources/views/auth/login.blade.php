@extends('layout.auth')
@section('title','Login')
@section('content')
   <form action="{{ route('custom-login') }}" method="POST">
      @csrf
      <h3>login now</h3>
      <input type="email" name="email" class="box" placeholder="Enter Your Email" value="{{old('email')}}" required>
      <input type="password" name="password" class="box" placeholder="Enter Your Password" minlength="6" required>
      <input type="submit" value="login now" class="btn" >
      <p>Don't Have An Account? <a href="{{route('register')}}">Register Now</a></p>
   </form>
@endsection
