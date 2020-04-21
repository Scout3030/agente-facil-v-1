@extends('layouts.app')

@section('content')

<!-- Content
  ============================================= -->
  <div id="content">

    <section class="section pt-5 pb-0">
      <div class="container">
        <div class="row">

          <!-- Withdrawal Funds
          ============================================= -->
          <div class="col-md-6 mb-5">
            <div class="bg-white shadow-sm rounded p-4 text-center">
              <div class="featured-box style-4 py-2">
                <div class="featured-box-icon text-light border rounded-circle shadow-none"> <i class="fas fa-download"></i> </div>
                <h3 class="text-body text-7 mb-3">Withdrawal Funds</h3>
                <p class="text-4 line-height-4">You can easily withdraw funds to your local bank account in local currency at excellent rates.</p>
                <div class="text-primary text-10 pt-3 pb-4 mb-2">up to 1.5%</div>
                <a href="#" class="text-muted btn-link text-4">Learn more<i class="fas fa-chevron-right text-2 ml-2"></i></a> </div>
            </div>
          </div>
          <!-- Withdrawal Funds end -->

          <!-- Deposit Funds
          ============================================= -->
          <div class="col-md-6 mb-5">
            <div class="bg-white shadow-sm rounded p-4 text-center">
              <div class="featured-box style-4 py-2">
                <div class="featured-box-icon text-light border rounded-circle shadow-none"> <i class="fas fa-upload"></i> </div>
                <h3 class="text-body text-7 mb-3">Deposit Funds</h3>
                <p class="text-4 line-height-4">With a wide variety of options for deposit your account. There is always an option that is right for you.</p>
                <div class="text-primary text-10 pt-3 pb-4 mb-2">up to 1.0%</div>
                <a href="#" class="text-muted btn-link text-4">Learn more<i class="fas fa-chevron-right text-2 ml-2"></i></a> </div>
            </div>
          </div>
          <!-- Deposit Funds end -->

          <!-- Receive Money
          ============================================= -->
          <div class="col-md-6 mb-5">
            <div class="bg-white shadow-sm rounded p-4 text-center">
              <div class="featured-box style-4 py-2">
                <div class="featured-box-icon text-light border rounded-circle shadow-none"> <i class="fas fa-hand-holding-usd"></i> </div>
                <h3 class="text-body text-7 mb-3">Receive Money</h3>
                <p class="text-4 line-height-4">Receiving money is always free of charge</p>
                <div class="text-primary text-10 pt-3 pb-4 mb-2">Free</div>
                <a href="#" class="text-muted btn-link text-4">Learn more<i class="fas fa-chevron-right text-2 ml-2"></i></a> </div>
            </div>
          </div>
          <!-- Receive Money end -->

          <!-- Send Money
          ============================================= -->
          <div class="col-md-6 mb-5">
            <div class="bg-white shadow-sm rounded p-4 text-center">
              <div class="featured-box style-4 py-2">
                <div class="featured-box-icon text-light border rounded-circle shadow-none"> <i class="fas fa-file-invoice-dollar"></i> </div>
                <h3 class="text-body text-7 mb-3">Send Money</h3>
                <p class="text-4 line-height-4">You can easily make payments at excellent rates.</p>
                <div class="text-primary text-10 pt-3 pb-4 mb-2">up to 1.0%</div>
                <a href="#" class="text-muted btn-link text-4">Learn more<i class="fas fa-chevron-right text-2 ml-2"></i></a> </div>
            </div>
          </div>
          <!-- Send Money end -->

          <!-- Currency Conversion
          ============================================= -->
          <div class="col-md-6 mb-5">
            <div class="bg-white shadow-sm rounded p-4 text-center">
              <div class="featured-box style-4 py-2">
                <div class="featured-box-icon text-light border rounded-circle shadow-none"> <i class="fas fa-exchange-alt"></i> </div>
                <h3 class="text-body text-7 mb-3">Currency Conversion</h3>
                <p class="text-4 line-height-4">We always give you the mid-market rate, which is the fairest exchange rate. </p>
                <div class="text-primary text-10 pt-3 pb-4 mb-2">up to 0.4%</div>
                <a href="#" class="text-muted btn-link text-4">Learn more<i class="fas fa-chevron-right text-2 ml-2"></i></a> </div>
            </div>
          </div>
          <!-- Currency Conversion end -->

          <!-- Administrative fee
          ============================================= -->
          <div class="col-md-6 mb-5">
            <div class="bg-white shadow-sm rounded p-4 text-center">
              <div class="featured-box style-4 py-2">
                <div class="featured-box-icon text-light border rounded-circle shadow-none"> <i class="fas fa-user"></i> </div>
                <h3 class="text-body text-7 mb-3">Administrative fee</h3>
                <p class="text-4 line-height-4">Keep using your Payyed Account and you will never be charged an administrative fee!</p>
                <div class="text-primary text-10 pt-3 pb-4 mb-2">Free</div>
                <a href="#" class="text-muted btn-link text-4">Learn more<i class="fas fa-chevron-right text-2 ml-2"></i></a> </div>
            </div>
          </div>
          <!-- Administrative fee end -->

        </div>
      </div>
    </section>

    <!-- Content
    ============================================= -->
    <section class="section bg-primary">
      <div class="container text-center">
        <h2 class="text-9 text-white"> Open a free account in minutes.</h2>
        <p class="text-5 text-white mb-4">Quickly and easily send, receive and request money. Over 180 countries and 80 currencies supported.</p>
        <a href="#" class="btn btn-light">Open a Free Account</a> </div>
    </section>
    <!-- Banner end -->

    <!-- Mobile App
    ============================================= -->
    <section class="section py-5">
      <div class="container">
        <div class="justify-content-center text-center">
          <h2 class="text-9">Get the app</h2>
          <p class="text-4 mb-4">Download our app for the fastest, most convenient way to send &amp; get Payment.</p>
          <a class="d-inline-flex mx-3" href=""><img alt="" src="images\app-store.png"></a> <a class="d-inline-flex mx-3" href=""><img alt="" src="images\google-play-store.png"></a> </div>
      </div>
    </section>
    <!-- Mobile App end -->

  </div>
  <!-- Content end -->

@endsection