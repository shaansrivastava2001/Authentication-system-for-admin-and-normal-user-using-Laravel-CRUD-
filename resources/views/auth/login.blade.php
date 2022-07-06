@extends('auth.layouts.base')
@push('title')
<title>Login</title>
@endpush
@section('main-section')
    <div class="container">
        <h2>Login</h2>
        <form action={{route('login_user')}} method="post" autocomplete="off">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-info" type="submit" >
                    Submit
                </button>
            </div>
            <a href="register">Are you a new user? Register</a>
        </form>
    </div>    

@endsection