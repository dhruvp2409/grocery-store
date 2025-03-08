@extends('layout.admin')
@section('title', 'Add Product')
@section('content')
    <section class="add-products">

        <h1 class="title">add new product</h1>

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex">
                <div class="inputBox">
                    <input type="text" name="name" value="{{ old('name') }}" class="box" required placeholder="enter product name">
                    <select name="category_id" class="box" required>
                        <option value="" selected disabled>select category</option>
                        @foreach ($categories as $k=>$category)
                            <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' :''}}>{{ $category->title }}</option>
                        @endforeach
                        {{-- <option value="vegitables">vegitables</option>
                        <option value="fruits">fruits</option>
                        <option value="meat">meat</option>
                        <option value="fish">fish</option> --}}
                    </select>
                </div>
                <div class="inputBox">
                    <input type="number" min="0" name="price" class="box" required
                        placeholder="enter product price" value="{{ old('price') }}">
                    <input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">
                </div>
            </div>
            <textarea name="description" class="box" required placeholder="enter product details" cols="30" rows="10">{{ old('description') }}</textarea>
            <input type="submit" class="btn">
        </form>

    </section>
@endsection
