@extends('layouts.app')

@section('content')

<!-- Content
============================================= -->
<div id="content">
    <div class="login-signup-page mx-auto my-5">
        <h3 class="font-weight-400 text-center">Sign In</h3>
        <p class="lead text-center">Your login information is safe with us.</p>
        <div class="bg-light shadow-md rounded p-4 mx-2">
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input id="emailAddress" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="form-check custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }}>

                            <label class="custom-control-label" for="remember-me">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-sm text-right">
                        @if (Route::has('password.request'))
                            <a class="btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>

                </div>
                <button class="btn btn-primary btn-block my-4" type="submit">{{ __('Login') }}</button>
            </form>
            <p class="text-3 text-muted text-center mb-0">Don't have an account? <a class="btn-link" href="{{route('register')}}">Sign Up</a></p>
        </div>
    </div>
<!-- Content end -->
@endsection
