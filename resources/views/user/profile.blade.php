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

          <!-- Personal Details
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Datos personales <a href="#edit-personal-details" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Nombre</p>
              <p class="col-sm-9">{{auth()->user()->name}}</p>
            </div>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Address</p>
              <p class="col-sm-9">4th Floor, Plot No.22, Above Public Park, 145 Murphy Canyon Rd,  Suite 100-18,<br>
                San Ditego,<br>
                California - 22434,<br>
                United States.</p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="edit-personal-details" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Personal Details</h5>
                  <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="personaldetails" method="post">
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="firstName">First Name</label>
                          <input type="text" value="Smith" class="form-control" data-bv-field="firstName" id="firstName" required="" placeholder="First Name">
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="fullName">Last Name</label>
                          <input type="text" value="Rhodes" class="form-control" data-bv-field="fullName" id="fullName" required="" placeholder="Full Name">
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="birthDate">Date of Birth</label>
                          <div class="position-relative">
                            <input id="birthDate" value="12-09-1982" type="text" class="form-control" required="" placeholder="Date of Birth">
                            <span class="icon-inside"><i class="fas fa-calendar-alt"></i></span> </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <h3 class="text-5 font-weight-400 mt-3">Address</h3>
                        <hr>
                      </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="address">Address</label>
                          <input type="text" value="4th Floor, Plot No.22, Above Public Park" class="form-control" data-bv-field="address" id="address" required="" placeholder="Address 1">
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="city">City</label>
                          <input id="city" value="San Ditego" type="text" class="form-control" required="" placeholder="City">
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="input-zone">State</label>
                          <select class="custom-select" id="input-zone" name="zone_id">
                            <option value=""> --- Please Select --- </option>
                            <option value="3613">Alabama</option>
                            <option value="3614">Alaska</option>
                            <option selected="selected" value="3624">California</option>

                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label for="zipCode">Zip Code</label>
                          <input id="zipCode" value="22434" type="text" class="form-control" required="" placeholder="City">
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block mt-2" type="submit">Save Changes</button>
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
            <h3 class="text-5 font-weight-400 mb-3">Direccion de correo <a href="#edit-email" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email ID <span class="text-muted font-weight-500">(Primary)</span></p>
              <p class="col-sm-9">{{auth()->user()->email}}</p>
            </div>
          </div>

          <!-- Phone
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 font-weight-400 mb-3">Teléfono <a href="#edit-phone" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mobile <span class="text-muted font-weight-500">(Primary)</span></p>
              <p class="col-sm-9">{{auth()->user()->phone}}</p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="edit-phone" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Phone</h5>
                  <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="phone" method="post">
                    <div class="row">
                      <div class="col-12">
                        <div class="form-group">
                          <label for="mobileNumber">Mobile <span class="text-muted font-weight-500">(Primary)</span></label>
                          <input type="text" value="+1 202-555-0125" class="form-control" data-bv-field="mobilenumber" id="mobileNumber" required="" placeholder="Mobile Number">
                        </div>
                      </div>
                    </div>
                    <a class="btn-link text-uppercase d-flex align-items-center text-1 float-right mb-3" href="#"><span class="text-3 mr-1"><i class="fas fa-plus-circle"></i></span>Add another Phone</a>
                    <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Phone End -->

          <!-- Security
          ============================================= -->
          <div class="bg-light shadow-sm rounded p-4">
            <h3 class="text-5 font-weight-400 mb-3">Seguridad <a href="#change-password" data-toggle="modal" class="float-right text-1 text-uppercase text-muted btn-link"><i class="fas fa-edit mr-1"></i>Edit</a></h3>
            <div class="row">
              <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">
                <label class="col-form-label">Contraseña</label>
              </p>
              <p class="col-sm-9">
                <input type="password" class="form-control-plaintext" data-bv-field="password" id="password" value="EnterPassword">
              </p>
            </div>
          </div>
          <!-- Edit Details Modal
          ================================== -->
          <div id="change-password" class="modal fade " role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title font-weight-400">Change Password</h5>
                  <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body p-4">
                  <form id="changePassword" method="post">
                    <div class="form-group">
                      <label for="existingPassword">Confirm Current Password</label>
                      <input type="text" class="form-control" data-bv-field="existingpassword" id="existingPassword" required="" placeholder="Enter Current Password">
                    </div>
                    <div class="form-group">
                      <label for="newPassword">New Password</label>
                      <input type="text" class="form-control" data-bv-field="newpassword" id="newPassword" required="" placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                      <label for="confirmPassword">Confirm New Password</label>
                      <input type="text" class="form-control" data-bv-field="confirmgpassword" id="confirmPassword" required="" placeholder="Enter Confirm New Password">
                    </div>
                    <button class="btn btn-primary btn-block mt-4" type="submit">Update Password</button>
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