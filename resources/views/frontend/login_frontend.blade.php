@extends('layouts.app')
<meta name="robots" content="noindex, nofollow" />

@section('content')
<section class="user_login py_8">
     <div class="container">
    <h2>Login to Your Account</h2>

@if(session('error'))
  <div class="alert alert-danger mt-2">{{ session('error') }}</div>
@endif
    <form action="{{ route('login.frontend.auth') }}" method="POST">
    @csrf
    <div class="form-group">
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"   class="form-control @error('email') is-invalid @enderror">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <input type="password" name="password" placeholder="Password"   class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-remember">
        <input type="checkbox" name="remember" id="rememberMe">
        <label for="rememberMe">Remember me</label>
    </div>

    <button type="submit" class="btn-login btn btn-primary">LOGIN</button>
     <div class="register-link">
      No account? <a href="{{route('register_frontend')}}">Create one here.</a>
 </div>
</form>




    </div>
  </div>
</section>



@endsection
