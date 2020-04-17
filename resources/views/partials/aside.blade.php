<!-- Left Panel
============================================= -->
<aside class="col-lg-3">
  <!-- Profile Details
  =============================== -->
  <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
    <div class="profile-thumb mt-3 mb-4"> <img class="rounded-circle" src="{{auth()->user()->pathAttachment()}}" alt="">
      <div class="profile-thumb-edit custom-file bg-primary text-white" data-toggle="tooltip" title="Change Profile Picture"> <i class="fas fa-camera position-absolute"></i>
        <input type="file" class="custom-file-input" id="customFile">
      </div>
    </div>
    <p class="text-3 font-weight-500 mb-2">Hola, {{auth()->user()->name}}</p>
    <p class="mb-2"><a href="profile.html" class="text-5 text-light" data-toggle="tooltip" title="Edit Profile"><i class="fas fa-edit"></i></a></p>
  </div>
  <!-- Profile Details End -->
  <!-- Available Balance
  =============================== -->
  <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
    <div class="text-17 text-light my-3"><i class="fas fa-wallet"></i></div>
    <h3 class="text-9 font-weight-400">S/{{auth()->user()->operations->sum('amount')}}</h3>
    <p class="mb-2 text-muted opacity-8">Total transferido/pagado</p>

    <!-- <hr class="mx-n3">
    <div class="d-flex"><a href="#" class="btn-link mr-auto">Withdraw</a> <a href="#" class="btn-link ml-auto">Deposit</a></div> -->
  </div>
  <!-- Available Balance End -->
  <!-- Need Help?
  =============================== -->
  <div class="bg-light shadow-sm rounded text-center p-3 mb-4">
    <div class="text-17 text-light my-3"><i class="fas fa-comments"></i></div>
    <h3 class="text-3 font-weight-400 my-4">Need Help?</h3>
    <p class="text-muted opacity-8 mb-4">Have questions or concerns regrading your account?<br>
    Our experts are here to help!.</p>
    <a href="#" class="btn btn-primary btn-block">Chate with Us</a>
  </div>
  <!-- Need Help? End -->
</aside>
<!-- Left Panel End -->