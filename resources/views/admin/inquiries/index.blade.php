@extends('layout.admin')
@section('title', 'Inquiries')
@section('content')
    <section class="messages">

        <h1 class="title">inquiries</h1>

        <div class="box-container">
            @if (count($inquiries) > 0)
                @foreach ($inquiries as $k => $inquiry)
                    <div class="box">
                        <p> user id : <span>{{ $inquiry->user_id }}</span> </p>
                        <p> name : <span>{{ $inquiry->name }}</span> </p>
                        <p> number : <span>{{ $inquiry->phone }}</span> </p>
                        <p> email : <span>{{ $inquiry->email }}</span> </p>
                        <p> message : <span>{{ $inquiry->message }}</span> </p>
                        <a href="javascript:void(0)" class="delete-btn"
                            onclick="event.preventDefault(); if(confirm('Delete this inquiry?')) document.getElementById('delete-form-{{ $inquiry->id }}').submit();">
                            Delete
                        </a>
                        <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST"
                            style="display: none;" id="delete-form-{{ $inquiry->id }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                @endforeach
            @else
                <p class="empty">you have no messages!</p>
            @endif
        </div>

    </section>
@endsection
