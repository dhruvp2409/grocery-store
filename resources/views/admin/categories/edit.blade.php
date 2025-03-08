@extends('layout.admin')
@section('title', 'Update Category')
@section('content')
    <section class="update-product">

        <h1 class="title">update category</h1>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="old_image" value="{{ $category->image }}">
            <img src="{{ asset('storage/' . $category->image) }}" alt="">
            <input type="text" name="title" class="box" required placeholder="enter category title"
                value="{{ old('title',$category->title) }}">
            <input type="number" min="0" name="sort_order" class="box" required placeholder="enter sort order"
                value="{{ old('sort_order',$category->sort_order) }}">
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
            <textarea name="description" class="box" required placeholder="enter category details" cols="30" rows="10">{{ old('description',$category->description) }}</textarea>
            <div class="flex-btn">
                <input type="submit" class="btn">
                <a href="{{ route('admin.categories.index') }}" class="option-btn">go back</a>
            </div>
        </form>

    </section>
@endsection
