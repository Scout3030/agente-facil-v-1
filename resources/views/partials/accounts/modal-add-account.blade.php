<!-- Add New Bank Account Details Modal
======================================== -->
<div id="add-new-bank-account" class="modal fade" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-400">Add bank account</h5>
        <button type="button" class="close font-weight-400" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body p-4">
        <form id="addbankaccount" method="post">
          <div class="mb-3">
            <div class="custom-control custom-radio custom-control-inline">
              <input id="personal" name="bankAccountType" class="custom-control-input" checked="" required="" type="radio">
              <label class="custom-control-label" for="personal">Personal</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input id="business" name="bankAccountType" class="custom-control-input" required="" type="radio">
              <label class="custom-control-label" for="business">Business</label>
            </div>
          </div>
          <div class="form-group">
            <label for="bankName">Bank Name</label>
            <select class="custom-select" id="bankName" name="bankName">
              <option value=""> Please Select </option>
              <option value="1">Bank Name 1</option>
              <option value="2">Bank Name 2</option>
              <option value="3">Bank Name 3</option>
              <option value="4">Bank Name 4</option>
              <option value="5">Bank Name 5</option>
              <option value="6">Bank Name 6</option>
              <option value="7">Bank Name 7</option>
              <option value="8">Bank Name 8</option>
            </select>
          </div>
          <div class="form-group">
            <label for="accountName">Account Name</label>
            <input type="text" class="form-control" data-bv-field="accountName" id="accountName" required="" value="" placeholder="e.g. Smith Rhodes">
          </div>
          <div class="form-group">
            <label for="accountNumber">Account Number</label>
            <input type="text" class="form-control" data-bv-field="accountNumber" id="accountNumber" required="" value="" placeholder="e.g. 12346678900001">
          </div>
          <div class="form-group">
            <label for="ifscCode">NEFT IFSC Code</label>
            <input type="text" class="form-control" data-bv-field="ifscCode" id="ifscCode" required="" value="" placeholder="e.g. ABCDE12345">
          </div>
          <div class="form-check custom-control custom-checkbox mb-3">
            <input id="remember-me" name="remember" class="custom-control-input" type="checkbox">
            <label class="custom-control-label" for="remember-me">I confirm the bank account details above</label>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Add Bank Account</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Bank Accounts End -->