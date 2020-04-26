@extends('layouts.app')

@section('content')

<!-- Content
============================================= -->
<div id="content">
    <div class="login-signup-page mx-auto my-5">
        <h3 class="font-weight-400 text-center">Ingresar</h3>
        <p class="lead text-center">Tu información es confidencial y segura con nosotros.</p>
        <div class="bg-light shadow-md rounded p-4 mx-2">
            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="emailAddress">Correo electrónico</label>
                    <input id="emailAddress" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="loginPassword">Contraseña</label>
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
                                {{ __('Recordar') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-sm text-right">
                        @if (Route::has('password.request'))
                            <a class="btn-link" href="{{ route('password.request') }}">
                                {{ __('¿Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                    </div>

                </div>
                <button class="btn btn-primary btn-block my-4" type="submit">{{ __('Login') }}</button>
            </form>
            <p class="text-3 text-muted text-center mb-0">¿No tienes una cuenta aún? <a class="btn-link" href="{{route('register')}}">Regístrate</a></p>
        </div>
    </div>
<!-- Content end -->
@endsection
