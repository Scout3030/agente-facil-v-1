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
        <h2 class="text-9 text-center"> La manera mas simple de realizar transferencias y pagos interbancarios</h2>
        <p class="text-4 text-center mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
        <div class="row">
          <div class="col-lg-3 mb-3">
            <div class="featured-box style-3">
              <div class="featured-box-icon text-light"><span class="w-100 text-20 font-weight-500">1</span></div>
              <h3>Crea tu cuenta</h3>
              <p class="text-3">Become a register user first, then log in to your account and enter your card or bank details that is required for you.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-3">
            <div class="featured-box style-3">
              <div class="featured-box-icon text-light"><span class="w-100 text-20 font-weight-500">2</span></div>
              <h3>Elige la operación que deseas realizar</h3>
              <p class="text-3">Enter your recipient's email address then add an amount with currency to send securely.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-3">
            <div class="featured-box style-3">
              <div class="featured-box-icon text-light"><span class="w-100 text-20 font-weight-500">3</span></div>
              <h3>Deposita los fondos</h3>
              <p class="text-3">After sending money, the recipient will be notified via an email when money has been transferred to their account.</p>
            </div>
          </div>
          <div class="col-lg-3 mb-3 mb-sm-0">
            <div class="featured-box style-3">
              <div class="featured-box-icon text-light"><span class="w-100 text-20 font-weight-500">4</span></div>
              <h3>Recibe tu confirmación de pago</h3>
              <p class="text-3">After sending money, the recipient will be notified via an email when money has been transferred to their account.</p>
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
                <h2 class="text-6 text-white mb-3">Why Payyed?</h2>
                <p class="text-light mb-5">Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet.</p>
                <h2 class="text-6 text-white mb-3">Send Money with Payyed</h2>
                <p class="text-light">Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet.</p>
                <p class="text-light mb-0">Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Trabajamos con más de 20 bancos</h3>
              <p>Essent lisque persius interesset his et, in quot quidam.</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Bajas comisiones</h3>
              <p>Lisque persius interesset his et, in quot quidam persequeris.</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Operaciones en menos de 20 minutos</h3>
              <p>Essent lisque persius interesset his et, in quot quidam.</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Sin salir de casa</h3>
              <p>Quidam lisque persius interesset his et, in quot quidam.</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>100% seguro</h3>
              <p>Essent lisque persius interesset his et, in quot quidam.</p>
            </div>
            <div class="featured-box style-1">
              <div class="featured-box-icon text-primary"> <i class="far fa-check-circle"></i> </div>
              <h3>Soporte con respuestas en minutos</h3>
              <p>Quidam lisque persius interesset his et, in quot quidam.</p>
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
        <p class="text-4 text-center mb-4">A payments experience people love to talk about</p>
        <div class="row">
          <div class="col-lg-10 col-xl-8 mx-auto">
            <div class="owl-carousel owl-theme" data-autoplay="true" data-nav="true" data-loop="true" data-margin="30" data-stagepadding="5" data-items-xs="1" data-items-sm="1" data-items-md="1" data-items-lg="1">
              <div class="item">
                <div class="testimonial rounded text-center p-4">
                  <p class="text-4">“Easy to use, reasonably priced simply dummy text of the printing and typesetting industry. Quidam lisque persius interesset his et, in quot quidam possim iriure.”</p>
                  <strong class="d-block font-weight-500">Jay Shah</strong> <span class="text-muted">Founder at Icomatic Pvt Ltd</span> </div>
              </div>
              <div class="item">
                <div class="testimonial rounded text-center p-4">
                  <p class="text-4">“I am happy Working with printing and typesetting industry. Quidam lisque persius interesset his et, in quot quidam persequeris essent possim iriure.”</p>
                  <strong class="d-block font-weight-500">Patrick Cary</strong> <span class="text-muted">Freelancer from USA</span> </div>
              </div>
              <div class="item">
                <div class="testimonial rounded text-center p-4">
                  <p class="text-4">“Fast easy to use transfers to a different currency. Much better value that the banks.”</p>
                  <strong class="d-block font-weight-500">De Mortel</strong> <span class="text-muted">Online Retail</span> </div>
              </div>
              <div class="item">
                <div class="testimonial rounded text-center p-4">
                  <p class="text-4">“I have used them twice now. Good rates, very efficient service and it denies high street banks an undeserved windfall. Excellent.”</p>
                  <strong class="d-block font-weight-500">Chris Tom</strong> <span class="text-muted">User from UK</span> </div>
              </div>
              <div class="item">
                <div class="testimonial rounded text-center p-4">
                  <p class="text-4">“It's a real good idea to manage your money by payyed. The rates are fair and you can carry out the transactions without worrying!”</p>
                  <strong class="d-block font-weight-500">Mauri Lindberg</strong> <span class="text-muted">Freelancer from Australia</span> </div>
              </div>
              <div class="item">
                <div class="testimonial rounded text-center p-4">
                  <p class="text-4">“Only trying it out since a few days. But up to now excellent. Seems to work flawlessly. I'm only using it for sending money to friends at the moment.”</p>
                  <strong class="d-block font-weight-500">Dennis Jacques</strong> <span class="text-muted">User from USA</span> </div>
              </div>
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
        <p class="text-4 text-center mb-4 mb-sm-5">Can't find it here? Check out our <a href="help.html">Help center</a></p>
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto">
            <hr class="mb-0">
            <div class="accordion accordion-alternate arrow-right" id="popularTopics">
              <div class="card">
                <div class="card-header" id="heading1">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">What is Payyed?</a> </h5>
                </div>
                <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#popularTopics">
                  <div class="card-body"> Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading2">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">How to send money online?</a> </h5>
                </div>
                <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#popularTopics">
                  <div class="card-body"> Iisque Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading3">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Is my money safe with Payyed?</a> </h5>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#popularTopics">
                  <div class="card-body"> Iisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading4">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">How much fees does Payyed charge?</a> </h5>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#popularTopics">
                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading5">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">What is the fastest way to send money abroad?</a> </h5>
                </div>
                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#popularTopics">
                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="heading6">
                  <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">Can I open an Payyed account for business?</a> </h5>
                </div>
                <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#popularTopics">
                  <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. </div>
                </div>
              </div>
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

@push('scripts')
  <script>
    var theForm = $("form-operation");
    console.log("theForm", theForm);
    // var button = $('#button-form')
    $('#button-form').on('click', function(e){
      e.preventDefault()
      console.log('hola')
    })
    // console.log("button", button);
  </script>
@endpush
