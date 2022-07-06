@extends('auth.layouts.base')
@push('title')
    <title>{{$data->name}} Dashboard</title>
@endpush
@section('main-section')
    <div class="container">
        <h2 class="text-dark">Welcome to the admin dashboard!</h2>
        <h3>Hii {{$data->name}}</h3>
        <h3>Your email is: {{$data->email}}</h3>
        <h3>Your role is: {{$data->role}}</h3>
        <button class="btn btn-danger"><a href="logout" style="text-decoration: none;color: white;">Logout</a></button>

        <table class="table mt-4">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userArr as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->role==null)
                        <td class="text-danger">No role</td>
                        @else
                        <td>{{$user->role}}</td>
                        @endif
                        <td>{{$user->created_at}}</td>
                        <td><button class="btn btn-danger btn-small mr-2"><a class="text-light text-decoration-none" href="delete/{{$user->id}}">Delete</a></button><button class="btn btn-warning btn-small"><a href="edit_admin/{{$user->id}}" class="text-light text-decoration-none">Edit</a></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection