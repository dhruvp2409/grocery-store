@extends('layout.admin')
@section('title', 'Add Product')
@section('content')
    <section class="add-products">

        <h1 class="title">add new category</h1>

        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" class="box" required placeholder="enter category title" value="{{ old('title') }}">
            <input type="number" min="0" name="sort_order" class="box" required placeholder="enter sort order" value="{{ old('sort_order') }}">
            <input type="file" name="image" required class="box" accept="image/jpg, image/jpeg, image/png">
            <textarea name="description" class="box" required placeholder="enter category details" cols="30" rows="10">{{ old('description') }}</textarea>
            <input type="submit" class="btn">
        </form>

    </section>
@endsection
