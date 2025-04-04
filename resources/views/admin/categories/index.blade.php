@extends('layout.admin')
@section('title', 'Categories')
@section('content')
    <section class="show-products">

        <h1 class="title">categories added</h1>
        <div class="add-product-btn-container">
            <a href="{{route('admin.categories.create') }}" class="add-btn">Add New Category</a>
        </div>
        <div class="box-container">

            @if (count($categories) > 0)
                @foreach ($categories as $k => $category)
                    <div class="box">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="">
                        <div class="name">{{ $category->title }}</div>
                        <div class="details">{{ $category->description }}</div>
                        <div class="flex-btn">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="option-btn">update</a>
                            <a href="javascript:void(0)" class="delete-btn"
                                onclick="event.preventDefault(); if(confirm('Delete this category?')) document.getElementById('delete-form-{{ $category->id }}').submit();">
                                Delete
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display: none;" id="delete-form-{{ $category->id }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                    </div>
                @endforeach

            @else
                <p class="empty">No categories added yet!</p>
            @endif

        </div>
        {{ $categories->links() }}
    </section>
@endsection
