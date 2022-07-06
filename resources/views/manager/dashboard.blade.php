@extends('auth.layouts.base')
@push('title')
    <title>{{$data->name}} Dashboard</title>
@endpush
@section('main-section')
    <div class="container">
        <h2 class="text-dark">Welcome to the manager dashboard!</h2>
        <h3>Hii {{$data->name}}</h3>
        <h3>Your email is: {{$data->email}}</h3>
        <h3>Your role is: {{$data->role}}</h3>
        <button class="btn btn-danger"><a href="logout" style="text-decoration: none;color: white;">Logout</a></button>
        <button class="btn btn-primary"><a href="edit_user/{{$data->id}}" style="text-decoration: none;color: white;">Edit Details</a></button>
    </div>
@endsection