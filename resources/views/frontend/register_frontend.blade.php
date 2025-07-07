@extends('layouts.app')
<meta name="robots" content="noindex, nofollow" />

@section('content')

<section class="user_login py_8">
    <div class="container">
    <h2>Create New Account</h2>
    <p>Already have an account? <a href="{{route('login_frontend')}}">Log in instead!</a></p>
  <form action="{{ route('register.frontend.store') }}" method="POST" autocomplete="off">
    @csrf

    <div class="form-group">
        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
        @error('first_name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="text" name="lname" value="{{ old('lname') }}" class="form-control @error('lname') is-invalid @enderror" placeholder="Last Name">
        @error('lname')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
    </div>

  <button type="submit" class="btn-register">REGISTER</button>
</form>

  </div>
</section>

@endsection
