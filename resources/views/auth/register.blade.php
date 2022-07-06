@extends('auth.layouts.base')
@push('title')
<title>Register</title>
@endpush
@section('main-section')
    <div class="container">
        <h2>Register</h2>
        <form action={{route('register_user')}} method="post" autocomplete="off">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{old('name')}}">
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <!--<div class="form-group">
                <label for="role">Role</label><br>
                <select name="role" class="form-select" id="role">
                    <option value="Manager">Manager</option>
                    <option value="HR">HR</option>
                    <option value="Employee">Employee</option>
                </select>
            </div>-->
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
            <a href="login">Already have an account? Login</a>
        </form>
    </div>    
@endsection