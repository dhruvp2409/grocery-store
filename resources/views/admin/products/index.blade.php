@extends('layout.admin')
@section('title', 'Products')
@section('content')
    <section class="show-products">

        <h1 class="title">products added</h1>
        <div class="add-product-btn-container">
            <a href="{{route('admin.products.create') }}" class="add-btn">Add New Product</a>
        </div>
        <div class="box-container">

            @if (count($products) > 0)
                @foreach ($products as $k => $product)
                    <div class="box">
                        <div class="price">${{ $product->price }}/-</div>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="">
                        <div class="name">{{ $product->name }}</div>
                        <div class="cat">{{ $product->category->title }}</div>
                        <div class="details">{{ $product->description }}</div>
                        <div class="flex-btn">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="option-btn">update</a>
                            <a href="javascript:void(0)" class="delete-btn"
                                onclick="event.preventDefault(); if(confirm('Delete this product?')) document.getElementById('delete-form-{{ $product->id }}').submit();">
                                Delete
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: none;" id="delete-form-{{ $product->id }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="empty">No products added yet!</p>;
            @endif

        </div>

    </section>
@endsection
