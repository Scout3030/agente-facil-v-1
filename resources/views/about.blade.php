@extends('layouts.app')

@section('content')

<!-- Content
  ============================================= -->
  <div id="content">

    <!-- Who we are
    ============================================= -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 d-flex">
            <div class="my-auto px-0 px-lg-5 mx-2">
              <h2 class="text-9">¿Quienes somos?</h2>
              <p class="text-4">Somos AGENTE FÁCIL, el primer agente multibanco online. Somos una empresa peruana creada con la finalidad de brindar los servicios de agente corresponsal de manera virtual, brindando una solución rápida para depósitos, tranferencias y pagos bancarios desde la comodidad de tu hogar.
              </p>
            </div>
          </div>
          <div class="col-lg-6 my-auto text-center"> <img class="img-fluid shadow-lg rounded-lg" src="{{asset('assets/images/who-we-are2.jpg')}}" alt=""> </div>
        </div>
      </div>
    </section>
    <!-- Who we are end -->

    <!-- Our Values
    ============================================= -->
    <section class="section bg-white">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-6 order-2 order-lg-1">
            <div class="row">
              <div class="col-6 col-lg-7 ml-auto mb-lg-n5"> <img class="img-fluid rounded-lg shadow-lg" src="{{asset('assets/images/our-values-vision.jpg')}}" alt="banner"> </div>
              <div class="col-6 col-lg-8 mt-lg-n5"> <img class="img-fluid rounded-lg shadow-lg" src="{{asset('assets/images/our-values-mission.jpg')}}" alt="banner"> </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex order-1 order-lg-2">
            <div class="my-auto px-0 px-lg-5">
              <h2 class="text-9 mb-4">Nuestros valores</h2>
              <h4 class="text-4 font-weight-500">Nuestra misión</h4>
              <p class="tex-3">Brindar servicios virtuales de agente corresponsal multibanco a todo el Perú.</p>
              <h4 class="text-4 font-weight-500 mb-2">Nuestra Vision</h4>
              <p class="tex-3">Ser el agente corresponsal del Perú, brindando cada día soluciones innovadoras a nuestros usuarios.</p>
              <h4 class="text-4 font-weight-500 mb-2">Nuestros valores</h4>
              <ul>
                <li><p class="tex-3">Integridad:</p><p class="text-2">Hacemos lo correcto siempre con transparencia y honestidad.</p></li>
                <li><p class="tex-3">Pasión por el Servicio:</p><p class="text-2">Pensamos siempre en los demás, en el cliente, dándoles soluciones ágiles.</p></li>
                <li><p class="tex-3">Innovación:</p><p class="text-2">Hacemos las cosas de forma diferente.</p></li>
              </ul>


            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Our Values end -->

    <!-- Leadership
    ============================================= -->
    <section class="section">
      <div class="container">
        <h2 class="text-9 text-center">Equipo</h2>
        <p class="text-4 text-center mb-5">Un equipo de profesionales a tu servicio.</p>
        <div class="row">
          <div class="col-sm-6 col-md-3 text-center mb-4 mb-md-0 offset-md-3">
            <div class="team rounded d-inline-block"> <img class="img-fluid rounded" alt="" src="{{asset('assets/images/team/leader.jpg')}}">
              <h3>Roberth Rodríguez</h3>
              <p class="text-muted">CEO &amp; Fundador</p>
              <ul class="social-icons social-icons-sm d-inline-flex">
                <li class="social-icons-facebook"><a data-toggle="tooltip" href="#" target="_blank" title="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li class="social-icons-twitter"><a data-toggle="tooltip" href="" target="_blank" title="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li class="social-icons-google"><a data-toggle="tooltip" href="" target="_blank" title="" data-original-title="Google"><i class="fab fa-google"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 text-center mb-4 mb-md-0">
            <div class="team rounded d-inline-block"> <img class="img-fluid rounded" alt="" src="{{asset('assets/images/team/leader-2.jpg')}}">
              <h3>Taylor Contreras</h3>
              <p class="text-muted">Co-Fundador</p>
              <ul class="social-icons social-icons-sm d-inline-flex">
                <li class="social-icons-facebook"><a data-toggle="tooltip" href="" target="_blank" title="" data-original-title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                <li class="social-icons-twitter"><a data-toggle="tooltip" href="" target="_blank" title="" data-original-title="Twitter"><i class="fab fa-twitter"></i></a></li>
                <li class="social-icons-google"><a data-toggle="tooltip" href="" target="_blank" title="" data-original-title="Google"><i class="fab fa-google"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Leadership end -->

    @include('shared.banks')

    <!-- Testimonial
    ============================================= -->
    <section class="section">
      <div class="container">
        <h2 class="text-9 text-center">Qué dice la geste sobre AGENTE FÁCIL</h2>
        <p class="text-4 text-center mb-4">Nuestros usuarios comentan sobre Agente Fácil</p>
        <div class="owl-carousel owl-theme" data-autoplay="true" data-nav="true" data-loop="true" data-margin="30" data-slideby="2" data-stagepadding="5" data-items-xs="1" data-items-sm="1" data-items-md="2" data-items-lg="2">
          @foreach(App\Review::all()->random(2) as $review)
            <div class="item">
              <div class="testimonial rounded text-center p-4">
                <span class="text-muted">{{$review->title}}</span>
                <p class="text-4">“{{$review->description}}”</p>
                <strong class="d-block font-weight-500">{{$review->user->name}}</strong>
              </div>
            </div>
          @endforeach
          </div>
        </div>
        <div class="text-center mt-4"><a href="{{route('reviews')}}" class="btn-link text-4">Ver más opiniones<i class="fas fa-chevron-right text-2 ml-2"></i></a></div>
      </div>
    </section>
    <!-- Testimonial end -->

    <!-- JOIN US
    ============================================= -->
    <section class="section bg-primary py-5">
      <div class="container text-center">
        <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon text-light mb-2"> <i class="fas fa-globe"></i> </div>
              <h4 class="text-12 text-white mb-0">20+</h4>
              <p class="text-4 text-white mb-0">Bancos</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3">
            <div class="featured-box text-center">
              <div class="featured-box-icon text-light mb-2"> <i class="fas fa-dollar-sign"></i> </div>
              <h4 class="text-12 text-white mb-0">1200</h4>
              <p class="text-4 text-white mb-0">Transferencias</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 mt-4 mt-md-0">
            <div class="featured-box text-center">
              <div class="featured-box-icon text-light mb-2"> <i class="fas fa-users"></i> </div>
              <h4 class="text-12 text-white mb-0">2M</h4>
              <p class="text-4 text-white mb-0">Usuarios</p>
            </div>
          </div>
          <div class="col-sm-6 col-md-3 mt-4 mt-md-0">
            <div class="featured-box text-center">
              <div class="featured-box-icon text-light mb-2"> <i class="far fa-life-ring"></i> </div>
              <h4 class="text-12 text-white mb-0">24X7</h4>
              <p class="text-4 text-white mb-0">Soporte</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- JOIN US end -->

  </div>
  <!-- Content end -->

@endsection