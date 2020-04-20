@extends('layouts.app')

@section('content')

 <!-- Content
  ============================================= -->
  <div id="content">

  <!-- Testimonial
    ============================================= -->
  <section class="section">
    <div class="container">
      <h2 class="text-9 text-center">What people say about Payyed</h2>
      <p class="text-4 text-center mb-5">A payments experience people love to talk about</p>
      <div class="row">
        <div class="col-lg-6 mb-4">
          <div class="testimonial rounded text-center p-4">
            <p class="text-4">“Easy to use, reasonably priced simply dummy text of the printing and typesetting industry. Quidam lisque persius interesset his et, in quot quidam possim iriure.”</p>
            <strong class="d-block font-weight-500">Jay Shah</strong> <span class="text-muted">Founder at Icomatic Pvt Ltd</span> </div>
        </div>
        <div class="col-lg-6 mb-4">
          <div class="testimonial rounded text-center p-4">
            <p class="text-4">“I am happy Working with printing and typesetting industry. Quidam lisque persius interesset his et, in quot quidam persequeris essent possim iriure.”</p>
            <strong class="d-block font-weight-500">Patrick Cary</strong> <span class="text-muted">Freelancer from USA</span> </div>
        </div>
        <div class="col-lg-6 mb-4">
          <div class="testimonial rounded text-center p-4">
            <p class="text-4">“Only trying it out since a few days. But up to now excellent. Seems to work flawlessly. I'm only using it for sending money to friends at the moment.”</p>
            <strong class="d-block font-weight-500">Dennis Jacques</strong> <span class="text-muted">User from USA</span> </div>
        </div>
        <div class="col-lg-6 mb-4">
          <div class="testimonial rounded text-center p-4">
            <p class="text-4">“I have used them twice now. Good rates, very efficient service and it denies high street banks an undeserved windfall. Excellent.”</p>
            <strong class="d-block font-weight-500">Chris Tom</strong> <span class="text-muted">User from UK</span> </div>
        </div>
      </div>
      <div class="text-center mt-4"><a href="#" class="btn-link text-4">See more people review<i class="fas fa-chevron-right text-2 ml-2"></i></a></div>
    </div>
  </section>
  <!-- Testimonial end -->


  <!-- Special Offer
    ============================================= -->
  <section class="hero-wrap py-5">
    <div class="hero-mask opacity-8 bg-dark"></div>
    <div class="hero-bg" style="background-image:url('images/bg/image-2.jpg');"></div>
    <div class="hero-content">
      <div class="container d-md-flex text-center text-md-left align-items-center justify-content-center">
        <h2 class="text-6 font-weight-400 text-white mb-3 mb-md-0">Sign up today and get your first transaction fee free!</h2>
        <a href="#" class="btn btn-outline-light text-nowrap ml-4">Sign up Now</a> </div>
    </div>
  </section>
  <!-- Special Offer end -->
</div>
<!-- Content end -->

@endsection