@extends('layouts.app')

@section('content')

 <!-- Content
  ============================================= -->
  <div id="content">

  <!-- Testimonial
    ============================================= -->
  <section class="section">
    <div class="container">
      <h2 class="text-9 text-center">Qué dice la gente sobre AGENTE FÁCIL</h2>
      <p class="text-4 text-center mb-5">Nuestros usuarios opinan</p>
      <div class="row">

        @foreach(App\Review::get() as $review)
        <div class="col-lg-6 mb-4">
          <div class="testimonial rounded text-center p-4">
            <span class="text-muted">{{$review->title}}</span>
            <p class="text-4">“{{$review->description}}”</p>
            <strong class="d-block font-weight-500">{{$review->user->name}}</strong>

          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- Testimonial end -->


  <!-- Special Offer
    ============================================= -->
  <section class="hero-wrap py-5">
    <div class="hero-mask opacity-8 bg-dark"></div>
    <div class="hero-bg" style="background-image:url('{{asset('assets/images/bg/image-2.jpg')}}');"></div>
    <div class="hero-content">
      <div class="container d-md-flex text-center text-md-left align-items-center justify-content-center">
        <h2 class="text-6 font-weight-400 text-white mb-3 mb-md-0">¡Regístrate y comienza a realizar tus operaciones!</h2>
        <a href="{{route('register')}}" class="btn btn-outline-light text-nowrap ml-4">Regístrate</a> </div>
    </div>
  </section>
  <!-- Special Offer end -->
</div>
<!-- Content end -->

@endsection