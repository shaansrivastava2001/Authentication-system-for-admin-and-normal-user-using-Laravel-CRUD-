@extends('auth.layouts.base')
@push('title')
<title>Edit</title>
@endpush
@section('main-section')
    <div class="container">
        <h2>Edit</h2>
        <form action={{route('edit_user')}} method="post" autocomplete="off">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{$data->name}}">
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{$data->email}}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="form-group mt-3">
                <button class="btn btn-info" type="submit" >
                    Update
                </button>
            </div>
        </form>
    </div>    
@endsection