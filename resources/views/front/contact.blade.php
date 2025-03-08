@extends('layout.front')
@section('title', 'Contact')
@section('content')
<section class="contact">
    <h1 class="title">get in touch</h1>
    <form action="{{ route('inquiry') }}" method="POST">
       @csrf
       <input type="text" name="name" class="box" required placeholder="enter your name">
       <input type="email" name="email" class="box" required placeholder="enter your email">
       <input type="text" name="phone" minlength="10" maxlength="10" class="box" required placeholder="enter your phone number">
       <textarea name="message" class="box" required placeholder="enter your message" cols="30" rows="10"></textarea>
       <input type="submit" value="send message" class="btn" >
    </form>
 </section>
@endsection
