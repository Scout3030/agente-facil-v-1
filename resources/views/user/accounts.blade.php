@extends('layouts.app')

@section('content')

@include('partials.user.menu')

  <!-- Content
  ============================================= -->
  <div id="content" class="py-4">
    <div class="container">
      <div class="row">

        @include('partials.aside')

        <!-- Middle Panel
        ============================================= -->
        <div class="col-lg-9">

          <!-- Bank Accounts
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-4">Mis cuentas
              <!-- <span class="text-muted text-4">(for withdrawal)</span> -->
            </h3>
            @forelse(auth()->user()->accounts->chunk(2) as $chunk)
            <div class="row mb-sm-1 mb-lg-3">
              @foreach($chunk as $account)
              <div class="col-12 col-sm-6">
                <div class="account-card account-card-primary text-white rounded mb-4 mb-lg-0">
                  <div class="row no-gutters">
                    <div class="col-3 d-flex justify-content-center p-3">
                      <div class="my-auto text-center text-13"> <i class="fas fa-university"></i>
                        <!-- <p class="bg-light text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 opacity-8 mb-0">Primary</p> -->
                      </div>
                    </div>
                    <div class="col-9 border-left">
                      <div class="py-4 my-2 pl-4">
                        <p class="text-4 font-weight-500 mb-1">{{$account->bank->name}}</p>
                        <p class="text-4 opacity-9 mb-1">XXXXXXXXXXXX-{{substr($account->number, -4)}}</p>
                        <!-- <p class="m-0">Approved <span class="text-3"><i class="fas fa-check-circle"></i></span></p> -->
                      </div>
                    </div>
                  </div>
                  <div class="account-card-overlay rounded">
                    <a href="#" data-target="#bank-account-details" data-toggle="modal" class="text-light btn-link mx-2">
                      <span class="mr-1"><i class="fas fa-share"></i></span>Más detales
                    </a>
                    <a href="#" class="text-light btn-link mx-2">
                      <span class="mr-1"><i class="fas fa-minus-circle"></i></span>Eliminar
                    </a>
                  </div>
                </div>
              </div>
              @endforeach

              @if(count($chunk) == 1)
              @include('partials.accounts.add-card')
              @endif

            </div>
            @empty
              @include('partials.accounts.add-card')
            @endforelse

            @if(auth()->user()->accounts->count() % 2 == 0)
            <div class="row mb-sm-1 mb-lg-3">
              @include('partials.accounts.add-card')
            </div>
            @endif
          </div>

          @include('partials.accounts.account-detail')

          @include('partials.accounts.modal-add-account')

        </div>
        <!-- Middle Panel End -->
      </div>
    </div>
  </div>
  <!-- Content end -->

@endsection