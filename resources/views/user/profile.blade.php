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

          @if (session('message'))
            <div class="alert alert-success" style="background: linear-gradient(-45deg, #0f5e9d, #418fce);; color: #fff">
              {{ session('message') }}
            </div>
          @endif

          <!-- Personal Details
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Datos personales <a href="#edit-personal-details" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Editar</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Nombre</p>
              <p class="col-sm-9">{{auth()->user()->name}}</p>
            </div>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Dirección</p>
              <p class="col-sm-9">{{auth()->user()->address}}</p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="edit-personal-details" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Datos personales</h5>
                  <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="personaldetails"
                        method="post"
                        action="{{route('user.profile.update')}}"
                        novalidate
                  >
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="firstName">Nombre</label>
                          <input type="text" name="name" value="{{auth()->user()->name}}" class="form-control" required="" placeholder="{{auth()->user()->name}}" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="address">Dirección</label>
                          <input type="text" value="{{auth()->user()->address ? auth()->user()->address : old('address')}}" class="form-control" name="address" required="" placeholder="Dirección" autocomplete="off">
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block mt-2" type="submit">Guardar cambios</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Personal Details End -->

          <!-- Account Settings
          ============================================= -->

          <!-- Email Addresses
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Direccion de correo</h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Correo electrónico</p>
              <p class="col-sm-9">{{auth()->user()->email}}</p>
            </div>
          </div>

          <!-- Phone
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Teléfono <a href="#edit-phone" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Editar</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3"><span class="text-muted font-weight-500">Número</span></p>
              <p class="col-sm-9">{{auth()->user()->phone}}</p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="edit-phone" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Teléfono</h5>
                  <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="phone"
                        method="post"
                        action="{{route('user.profile.update')}}"
                        novalidate
                  >
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="mobileNumber"><span class="text-muted font-weight-500">Número</span></label>
                          <input type="text" value="" name="phone" class="form-control" required="" placeholder="999 999 999" autocomplete="off">
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Guardar cambios</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Phone End -->

          <!-- Security
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4">
            <h3 class="text-5 font-weight-400 mb-3">Seguridad <a href="#change-password" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Editar</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">
                <label class="col-form-label">Contraseña</label>
              </p>
              <p class="col-sm-9">
                <input type="password" class="form-control-plaintext" value="EnterPassword" disabled>
              </p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="change-password" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Cambiar contraseña</h5>
                  <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="changePassword"
                        method="post"
                        action="{{route('user.profile.update')}}"
                        novalidate
                  >
                    @csrf
                    @method('put')
                    <div class="form-group">
                      <label for="existingPassword">Contraseña actual</label>
                      <input type="text" class="form-control" required="" placeholder="Ingresa tu contraseña actual">
                    </div>
                    <div class="form-group">
                      <label for="newPassword">Nueva contraseña</label>
                      <input type="text" class="form-control" name="password" required="" placeholder="Ingresa tu nueva contraseña">
                    </div>
                    <div class="form-group">
                      <label for="confirmPassword">Confirmar nueva contraseña</label>
                      <input type="text" class="form-control" required="" placeholder="Confirma tu contraseña">
                    </div>
                    <button class="btn btn-primary btn-block mt-4" type="submit">Guardar cambios</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Security End -->

        </div>
        <!-- Middle Panel End -->
      </div>
    </div>
  </div>
  <!-- Content end -->

@endsection