@extends('layout.admin')
@section('title', 'Users')
@section('content')
    <section class="user-accounts">

        <h1 class="title">user accounts</h1>

        <div class="box-container">
            @if (count($users) > 0)
                @foreach ($users as $k => $user)
                    <div class="box">
                        <img src="{{ asset('storage/' . $user->image) }}" alt="">
                        <p> user id : <span>{{ $user->id }}</span></p>
                        <p> username : <span>{{ $user->name }}</span></p>
                        <p> email : <span>{{ $user->email }}</span></p>
                        <p> user type : <span>{{ $user->role == 1 ? 'admin': 'user' }}</span></p>
                        <a href="javascript:void(0)" class="delete-btn"
                            onclick="event.preventDefault(); if(confirm('Delete this user?')) document.getElementById('delete-form-{{ $user->id }}').submit();">
                            Delete
                        </a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                            style="display: none;" id="delete-form-{{ $user->id }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                @endforeach
            @else
                <p class="empty">No users found!</p>
            @endif
        </div>

    </section>
@endsection
