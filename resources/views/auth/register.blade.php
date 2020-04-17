@extends('layouts.app')

@section('content')
<!-- Content
  ============================================= -->
<div id="content">
    <div class="login-signup-page mx-auto my-5">
        <h3 class="font-weight-400 text-center">Sign Up</h3>
        <p class="lead text-center">Your Sign Up information is safe with us.</p>
        <div class="bg-light shadow-md rounded p-4 mx-2">
            <form id="signupForm" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="fullName">Full Name</label>
                    <input id="fullName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input id="emailAddress" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-primary btn-block my-4">
                    {{ __('Register') }}
                </button>
            </form>
            <p class="text-3 text-muted text-center mb-0">Already have an account? <a class="btn-link" href="{{route('login')}}">Log In</a></p>
        </div>
    </div>
  <!-- Content end -->
@endsection
