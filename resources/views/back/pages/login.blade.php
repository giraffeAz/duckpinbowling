@extends('back.layout.auth-layout')
@section('title') {{'Login'}} @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="card shadow-lg rounded-4 border-0">
          <div class="card-body p-5">

            <!-- Logo + App Name -->
            <div class="text-center mb-4">
             <img src="{{ asset('images/modernlogo.svg') }}" alt="App Logo" width="250" height="250" class="mb-2">
               
              <p class="text-muted mb-0">Tabulation and Duckpin Bowling Tournament Management System</p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="">
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
              </div>

              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember">
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <a href="" class="small text-decoration-none">Forgot password?</a>
              </div>

              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
            </form>

            <p class="text-center text-muted mt-4 mb-0">
              Don’t have an account?
              <a href="" class="fw-semibold text-decoration-none">Register</a>
            </p>

          </div>
        </div>
      </div>
    </div>
  </div>

 
@endsection