@extends('layout.admin')
@section('title','Update Profile')
@section('content')
<section class="update-profile">
    <h1 class="title">update profile</h1>
    <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
       @csrf
       @if (!empty(auth()->user()->image))
          <img src="{{ asset('storage/' . auth()->user()->image) }}" alt="">
       @else
          <img src="{{ asset('images/user-pic.jpg') }}" alt="">
       @endif
       <div class="flex">
          <div class="inputBox">
             <span>username :</span>
             <input type="text" name="name" value="{{old('name',auth()->user()->name)}}" placeholder="update username" required class="box">
             <span>email :</span>
             <input type="email" name="email" value="{{old('email',auth()->user()->email)}}" placeholder="update email" required readonly class="box">
             <span>update pic :</span>
             <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box">
             <input type="hidden" name="old_image" value="{{ auth()->user()->image }}">
          </div>
          <div class="inputBox">
             <span>old password :</span>
             <input type="password" name="old_password" placeholder="enter previous password" class="box">
             <span>new password :</span>
             <input type="password" name="new_password" placeholder="enter new password" class="box">
             <span>confirm password :</span>
             <input type="password" name="confirm_password" placeholder="confirm new password" class="box">
          </div>
       </div>
       <div class="flex-btn">
          <input type="submit" class="btn" value="update profile" >
          <a href="{{ route('admin.home') }}" class="option-btn">go back</a>
       </div>
    </form>
</section>
@endsection
