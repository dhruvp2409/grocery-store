@extends('layout.front')
@section('title', 'About')
@section('content')
    <section class="about">
        <div class="row">
            <div class="box">
                <img src="{{ asset('images/about-img-1.png') }}" alt="">
                <h3>why choose us?</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, a quod, quis alias eius dignissimos
                    pariatur laborum dolorem ad ullam iure, consequatur autem animi illo odit! Atque quia minima
                    voluptatibus.</p>
                <a href="{{ route('contact') }}" class="btn">contact us</a>
            </div>
            <div class="box">
                <img src="{{ asset('images/about-img-2.png') }}" alt="">
                <h3>what we provide?</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quisquam, a quod, quis alias eius dignissimos
                    pariatur laborum dolorem ad ullam iure, consequatur autem animi illo odit! Atque quia minima
                    voluptatibus.</p>
                <a href="shop.php" class="btn">our shop</a>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1 class="title">clients reivews</h1>
        <div class="box-container">
            <div class="box">
                <img src="{{ asset('images/pic-1.png') }}" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
                    amet deserunt aperiam quas ex.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/pic-2.png') }}" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
                    amet deserunt aperiam quas ex.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/pic-3.png') }}" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
                    amet deserunt aperiam quas ex.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/pic-4.png') }}" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
                    amet deserunt aperiam quas ex.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/pic-5.png') }}" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
                    amet deserunt aperiam quas ex.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
            <div class="box">
                <img src="{{ asset('images/pic-6.png') }}" alt="">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et voluptates sit earum, neque non cupiditate
                    amet deserunt aperiam quas ex.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
        </div>
    </section>
@endsection
