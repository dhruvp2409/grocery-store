@extends('layout.admin')
@section('title', 'User Activities Report')
@section('styles')
    <style>
        /* Add custom CSS for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
@endsection
@section('content')
    <section class="user-activities">

        <h1 class="title">User Activities Report</h1>

        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($user_activities as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role == 1 ? 'Admin' : 'User' }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </section>
@endsection
