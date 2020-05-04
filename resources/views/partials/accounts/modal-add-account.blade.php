<!--Add New Bank Account Details Modal
======================================== -->
<div id="add-new-bank-account" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-400">Agregar cuenta</h5>
        <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body p-4">
        <form id="addbankaccount" method="post" action="{{route('user.accounts.store')}}" novalidate>
          @csrf
          <!-- <div class="mb-3">
            <div class="custom-control custom-radio custom-control-inline">
              <input id="personal" name="bankAccountType" class="custom-control-input" checked="" required="" type="radio">
              <label class="custom-control-label" for="personal">Personal</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input id="business" name="bankAccountType" class="custom-control-input" required="" type="radio">
              <label class="custom-control-label" for="business">Empresa</label>
            </div>
          </div> -->
          <div class="form-group">
            <label for="bankName">Banco</label>
            <select class="custom-select" name="bank_id">
              <option value=""> Selecciona </option>
              @foreach($banks as $bank)
              <option value="{{$bank->id}}">{{$bank->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="accountName">Nombre de cuenta</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="accountNumber">Numero de cuenta</label>
            <input type="text" class="form-control" name="number">
          </div>
          <div class="form-check custom-control custom-checkbox mb-3">
            <!-- <input id="remember-me" name="remember" class="custom-control-input" type="checkbox"> -->
            <!-- <label class="custom-control-label" for="remember-me">I confirm the bank account details above</label> -->
          </div>
          <button class="btn btn-primary btn-block" type="submit">Añadir cuenta</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Bank Accounts End-->

@push('scripts')
<script src="{{asset('assets/vendor/inputmask/dist/jquery.inputmask.js')}}"></script>
@endpush