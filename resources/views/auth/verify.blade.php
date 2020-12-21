@extends('layouts.app')

@section('content')

<section class="section py-3 my-3 py-sm-5 my-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-8 offset-lg-2">
                <div class="bg-light shadow-sm rounded p-4 text-center"> <span class="d-block text-17 text-primary mt-2 mb-3"><i class="fas fa-credit-card"></i></span>
                    <h3 class="text-body text-4">Verifica tu cuenta</h3>
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un link de verificación fuen enviado a tu correo electrónico.') }}
                        </div>
                    @endif
                    <p class="mb-0">
                        <p>
                            {{ __('Antes de proceder, por favor verifica tu correo electrónico.') }}
                            {{ __('Si no has recibido el correo') }},
                        </p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click aqui para solicitar nuevamente') }}</button>.
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
