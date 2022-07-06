@extends('auth.layouts.base')
@push('title')
    <title>Welcome</title>
@endpush
@section('main-section')
<body class="bg-dark">
      <div class="container">
        <h2 class="text-light text-center text-bold mt-4">Welcome to the page!!!</h2>
        <div class="justify-content-center text-center m-auto pt-5">
            <button class="btn btn-success mr-3"><a href="login" class="text-white text-decoration-none">Login</a></button>
            <button class="btn btn-success"><a href="register" class="text-white text-decoration-none">Register</a></button>
        </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  @endsection