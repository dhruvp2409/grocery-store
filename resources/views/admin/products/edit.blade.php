@extends('layout.admin')
@section('title', 'Update Product')
@section('content')
    <section class="update-product">

        <h1 class="title">update product</h1>
        <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="old_image" value="{{ $product->image }}">
            <img src="{{ asset('storage/' . $product->image) }}" alt="">
            <input type="text" name="name" placeholder="enter product name" required class="box"
                value="{{ old('name', $product->name) }}">
            <input type="number" name="price" min="0" placeholder="enter product price" required class="box"
                value="{{ old('price', $product->price) }}">
            <select name="category_id" class="box" required>
                <option value="" selected disabled>select category</option>
                @foreach ($categories as $k => $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category->id) ? 'selected' : '' }}>
                        {{ $category->title }}</option>
                @endforeach
            </select>
            <input type="number" min="{{ $product->stock }}" name="stock" class="box" required placeholder="enter product stock"
                value="{{ old('stock', $product->stock) }}">
            <textarea name="description" required placeholder="enter product details" class="box" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            <div class="flex-btn">
                <input type="submit" class="btn">
                <a href="{{ route('admin.products.index') }}" class="option-btn">go back</a>
            </div>
        </form>

    </section>
@endsection
