<!-- Edit Bank Account Details Modal
======================================== -->
<div id="bank-account-details" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered transaction-details" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row no-gutters">
          <div class="col-sm-5 d-flex justify-content-center bg-primary rounded-left py-4">
            <div class="my-auto text-center">
              <div class="text-17 text-white mb-3"><i class="fas fa-university"></i></div>
              <h3 class="text-6 text-white my-3">{{$account->bank->name}}</h3>
              <!-- <div class="text-4 text-white my-4">XXX-9027 | INR</div> -->
              <p class="bg-light text-0 text-body font-weight-500 rounded-pill d-inline-block px-2 line-height-4 mb-0">Activa</p>
            </div>
          </div>
          <div class="col-sm-7">
            <h5 class="text-5 font-weight-400 m-3">Detalles
            <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </h5>
            <hr>
            <div class="px-3">
              <!-- <ul class="list-unstyled">
                <li class="font-weight-500">Account Type:</li>
                <li class="text-muted">Personal</li>
              </ul> -->
              <ul class="list-unstyled">
                <li class="font-weight-500">Nombre de cuenta:</li>
                <li class="text-muted">{{$account->name}}</li>
              </ul>
              <ul class="list-unstyled">
                <li class="font-weight-500">Número de cuenta:</li>
                <li class="text-muted">XXXXXXXXXXXX-{{substr($account->number, -4)}}</li>
              </ul>
              <!-- <ul class="list-unstyled">
                <li class="font-weight-500">Bank Country:</li>
                <li class="text-muted">India</li>
              </ul> -->
              <!-- <ul class="list-unstyled">
                <li class="font-weight-500">Status:</li>
                <li class="text-muted">Approved <span class="text-success text-3"><i class="fas fa-check-circle"></i></span></li>
              </ul> -->
              <p>
                <a href="{{ route('user.accounts.destroy', $account->id) }}"
                  class="btn btn-sm btn-outline-danger btn-block shadow-none"
                  onclick="event.preventDefault();
                       document.getElementById('delete-account-{{$account->id}}').submit();"
                >
                  <span class="mr-1">
                    <i class="fas fa-minus-circle"></i>
                  </span>Eliminar cuenta
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>