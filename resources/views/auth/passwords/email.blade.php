@extends('layouts.app')

@section('content')
<!-- Content
============================================= -->
<div id="content">
    <div class="login-signup-page mx-auto my-5">
        <h3 class="font-weight-400 text-center">Restablecer contraseña</h3>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="bg-light shadow-md rounded p-4 mx-2">
            <form id="loginForm" method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <label for="emailAddress">Correo electrónico</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ingresa tu correo electrónico">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block my-4" type="submit">Enviar</button>
            </form>
        </div>
    </div>
<!-- Content end -->
@endsection
