@extends('layouts.app')

@section('content')
<!-- Content
  ============================================= -->
  <div id="content">

    <!-- Send Money
    ============================================= -->
    <section class="hero-wrap section shadow-md py-4">
      <div class="hero-mask opacity-7 bg-dark"></div>
      <div class="hero-bg" style="background-image:url('{{asset('assets/images/bg/image-6.jpg')}}');"></div>
      <div class="hero-content py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-xl-7 my-auto text-center text-lg-left pb-4 pb-lg-0">
              <h2 class="text-17 text-white"><span class="font-weight-400 text-15">La mejor manera de gestionar tu dinero</span> <br>
                Entre bancos</h2>
              <p class="text-4 text-white mb-4"> Realiza transferencias y pagos intebancarios sin muchas complicaciones y sin salir de casa</p>
              <a class="btn btn-outline-light video-btn" href="#" data-src="https://www.youtube.com/embed/7e90gBu4pas" data-toggle="modal" data-target="#videoModal"><span class="text-2 mr-3"><i class="fas fa-play"></i></span>Mira cómo funciona</a> </div>
            <div class="col-lg-6 col-xl-5 my-auto">
              <div class="bg-white rounded shadow-md p-4">
                <h3 class="text-5 text-center">Operaciones</h3>
                <hr class="mb-4">

                <operations-home-component :banks="{{$banks}}"></operations-home-component>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Send Money End -->

    <!-- How it works
    ============================================= -->
    <section class="section bg-white">
      <div class="container">
        <h2 class="text-9 text-center"> Agente Fácil, tu agente corresponsal multibanco online.</h2>
        <p class="text-4 text-center mb-5">Realiza tus operaciones frecuentes en 4 simples pasos.</p>
        <div class="row">
          <div class="col-lg-3 mb-3">
            <div class="featured-box style-3">
              <div class="featured-box-icon text-light"><span class="w-100 text-20 font-weight-500">1</span></div>
              <h3>Crea tu cuenta</h3>
              <p class="text-3">Crea tu cuenta e inicia sesión en la plataforma.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-3">
            <div class="featured-box style-3">
              <div class="featured-box-icon text-light"><span class="w-100 text-20 font-weight-500">2</span></div>
              <h3>Elige la operación que deseas realizar</h3>
              <p class="text-3">Elige la operación que vas a realizar, puedes seleccionar entre transferencias interbancarias y pagos.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-3">
            <div class="featured-box style-3">
              <div class="featured-box-icon text-light"><span class="w-100 text-20 font-weight-500">3</span></div>
              <h3>Deposita los fondos</h3>
              <p class="text-3">Envía los fondos para realizar tu operación.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-3 mb-sm-0">
            <div class="featured-box style-3">
              <div class="featured-box-icon text-light"><span class="w-100 text-20 font-weight-500">4</span></div>
              <h3>Recibe tu confirmación de pago</h3>
              <p class="text-3">Nuestro equipo realizará tu operación y te enviará el comprobante respectivo.</p>
            </div>
          </div>
        </div>
        <div class="text-center mt-2"><a href="{{route('register')}}" class="btn btn-outline-primary shadow-none text-uppercase">Regístrate</a></div>
      </div>
    </section>
    <!-- How it works End -->

    <!-- Why choose us
    ============================================= -->
    <section class="section">
      <div class="container">
        <h2 class="text-9 text-center">¿Por qué elegir Agence Fácil?</h2>
        <p class="text-4 text-center mb-5">Razones para realizar tus operaciones por Agente Fácil.</p>
        <div class="row">
          <div class="col-md-6 mb-4 mb-md-0">
            <div class="hero-wrap section h-100 p-5 rounded">
              <div class="hero-mask rounded opacity-6 bg-dark"></div>
              <div class="hero-bg rounded" style="background-image:url('{{asset('assets/images/bg/image-6.jpg')}}');"></div>
              <div class="hero-content">
                <h2 class="text-6 text-white mb-3">¿Por qué Agente Fácil?</h2>
                <p class="text-light mb-5">Ya no corras más por distintos lugares a realizar tus pagos y transferencias, desde un solo lugar y desde una única cuenta, puedes realiar todas tus operaciones. Y desde la comodidad de tu casa.</p>
                <h2 class="text-6 text-white mb-3">Realiza tranferencias interbancarias y pagos</h2>
                <p class="text-light">Con nuestro sistema multiagente, puedes realizar pagos en distintos bancos, solo transfiere los fondos y nuestros operadores se encargarán de realizar tu operación.</p>
                <p class="text-light mb-0">Las comisiones son mínimas en comparación a las comisiones de otros medios de pago.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Trabajamos con más de 20 bancos a nivel nacional</h3>
              <p>Agente Fácil trabaja con la mayor cantidad posible de bancos, garantizando que puedas realizar tus operaciones.</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Bajas comisiones</h3>
              <p>Un buen servicio a un bajo precio.</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Operaciones en menos de 20 minutos</h3>
              <p>Tus operaciones son confirmadas en menos de 20 minutos.</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Sin salir de casa</h3>
              <p>Ingresa a Agente Fácil por internet, sin salir de casa y desde cualquier dispositivo.</p>
            </div>
            <!-- <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>100% seguro</h3>
              <p>Essent lisque persius interesset his et, in quot quidam.</p>
            </div> -->
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Soporte con respuestas en minutos</h3>
              <p>Si tienes preguntas, te respondemos minutos.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Why choose us End -->

    @include('shared.banks')

    <!-- How work
    ============================================= -->
    <section class="hero-wrap section shadow-md">
      <div class="hero-mask opacity-9 bg-primary"></div>
      <div class="hero-bg" style="background-image:url('{{asset('assets/images/bg/image-1.jpg')}}');"></div>
      <div class="hero-content py-3 py-lg-5 my-3 my-lg-5">
        <div class="container text-center">
          <h2 class="text-9 text-white mb-4 mb-lg-5">¿Cómo funciona Agente Fácil?</h2>
          <a class="video-btn d-inline-flex" href="#" data-src="https://www.youtube.com/embed/7e90gBu4pas" data-toggle="modal" data-target="#videoModal"> <span class="btn-video-play bg-white shadow-md rounded-circle m-auto"><i class="fas fa-play"></i></span> </a> </div>
      </div>
    </section>
    <!-- How work End -->

    <!-- Testimonial
    ============================================= -->
    <section class="section">
      <div class="container">
        <h2 class="text-9 text-center">¿Qué dice la gente sobre nosotros?</h2>
        <p class="text-4 text-center mb-4">Nuestros usuarios comentan sobre Agente Fácil</p>
        <div class="row">
          <div class="col-lg-10 col-xl-8 mx-auto">
            <div class="owl-carousel owl-theme" data-autoplay="true" data-nav="true" data-loop="true" data-margin="30" data-stagepadding="5" data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1">
              @foreach(App\Review::all()->random(1) as $review)
              <div class="item">
                <div class="testimonial rounded text-center p-4">
                  <span class="text-muted">{{$review->title}}</span>
                  <p class="text-4">“{{$review->description}}”</p>
                  <strong class="d-block font-weight-500">{{$review->user->name}}</strong>
                </div>
              </div>
              @endforeach
            </div>
            <div class="text-center mt-4"><a href="{{route('reviews')}}" class="btn-link text-4">Ver más opiniones<i class="fas fa-chevron-right text-2 ml-2"></i></a></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial end -->

    <!-- Frequently asked questions
    ============================================= -->
    <section class="section bg-white">
      <div class="container">
        <h2 class="text-9 text-center">Preguntas frecuentes</h2>
        <p class="text-4 text-center mb-4 mb-sm-5">Si no encuentras respuesta, escríbenos a nuestro <a href="https://api.whatsapp.com/send?phone=51944001458&text=Hola%20necesito%20ayuda%20con%20una%20operaci%C3%B3n">Centro de atención</a></p>
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto">
            <hr class="mb-0">
            <div class="accordion accordion-alternate arrow-right" id="popularTopics">

              @foreach(App\Question::orderBy('title', 'asc')->take(6)->get() as $faq)
              <div class="card">
                <div class="card-header" id="heading{{$faq->id}}">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">{{$faq->title}}</a> </h5>
                </div>
                <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}" data-parent="#popularTopics">
                  <div class="card-body">
                    {{$faq->description}}
                  </div>
                </div>
              </div>
              @endforeach

            </div>
            <hr class="mt-0">
          </div>
        </div>
        <div class="text-center mt-4"><a href="{{route('faq')}}" class="btn-link text-4">Ver más preguntas frecuentes<i class="fas fa-chevron-right text-2 ml-2"></i></a></div>
      </div>
    </section>
    <!-- Frequently asked questions end -->

    <!-- Special Offer
    ============================================= -->
    <section class="hero-wrap py-5">
      <div class="hero-mask opacity-8 bg-dark"></div>
      <div class="hero-bg" style="background-image:url('{{asset('assets/images/bg/image-2.jpg')}}');"></div>
      <div class="hero-content">
        <div class="container d-md-flex text-center text-md-left align-items-center justify-content-center">
          <h2 class="text-6 font-weight-400 text-white mb-3 mb-md-0">¡Crea tu cuenta e inicia tu primera operación!</h2>
          <a href="{{route('register')}}" class="btn btn-outline-light text-nowrap ml-4">Registrarme</a> </div>
      </div>
    </section>
    <!-- Special Offer end -->
  </div>
  <!-- Content end -->

@endsection
