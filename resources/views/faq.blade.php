@extends('layouts.app')

@section('content')

<!-- Content
  ============================================= -->
  <div id="content">

    <!-- Main Topics
    ============================================= -->
    <section class="section py-3 my-3 py-sm-5 my-sm-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
            <div class="bg-light shadow-sm rounded p-4 text-center"> <span class="d-block text-17 text-primary mt-2 mb-3"><i class="fas fa-user-circle"></i></span>
              <h3 class="text-body text-4">Mi cuenta</h3>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
            <div class="bg-light shadow-sm rounded p-4 text-center"> <span class="d-block text-17 text-primary mt-2 mb-3"><i class="fas fa-money-check-alt"></i></span>
              <h3 class="text-body text-4">Depósitos</h3>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3 mb-4 mb-sm-0">
            <div class="bg-light shadow-sm rounded p-4 text-center"> <span class="d-block text-17 text-primary mt-2 mb-3"><i class="fas fa-shield-alt"></i></span>
              <h3 class="text-body text-4">Seguridad</h3>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="bg-light shadow-sm rounded p-4 text-center"> <span class="d-block text-17 text-primary mt-2 mb-3"><i class="fas fa-credit-card"></i></span>
              <h3 class="text-body text-4">Pagos</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Main Topics end -->

    <!-- Popular Topics
    ============================================= -->
    <section class="section bg-white">
      <div class="container">
        <h2 class="text-9 text-center">Temas frecuentes</h2>
        <p class="text-4 text-center mb-5">Ponemos a tu disposición las preguntas más solicitadas por nuestros clientes.</p>
        <div class="row">
          <div class="col-md-10 mx-auto">
            <div class="row">

              @foreach(App\Question::orderBy('title', 'asc')->get()->chunk(round(count(App\Question::orderBy('title', 'asc')->get()) / 2)) as $chunk)
              <div class="col-md-6">
                <div class="accordion accordion-alternate" id="popularTopics">

                  @foreach($chunk as $faq)
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
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Popular Topics end -->

    <!-- Can't find
    ============================================= -->
    <section class="section py-4 my-4 py-sm-5 my-sm-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="bg-white shadow-sm rounded pl-4 pl-sm-0 pr-4 py-4">
              <div class="row no-gutters">
                <div class="col-12 col-sm-auto text-13 text-light d-flex align-items-center justify-content-center"> <span class="px-4 ml-3 mr-2 mb-4 mb-sm-0"><i class="far fa-envelope"></i></span> </div>
                <div class="col text-center text-sm-left">
                  <div class="">
                    <h5 class="text-3 text-body">¿No encuentras lo que buscas?</h5>
                    <p class="text-muted mb-0">Contáctanos y te responderemos en la brevedad del caso. <a class="btn-link" href="https://api.whatsapp.com/send?phone=51944001458&text=Hola%20necesito%20ayuda%20con%20una%20operaci%C3%B3n" target="_blank">Contactar<span class="text-1 ml-1"><i class="fas fa-chevron-right"></i></span></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="bg-white shadow-sm rounded pl-4 pl-sm-0 pr-4 py-4">
              <div class="row no-gutters">
                <div class="col-12 col-sm-auto text-13 text-light d-flex align-items-center justify-content-center"> <span class="px-4 ml-3 mr-2 mb-4 mb-sm-0"><i class="far fa-comment-alt"></i></span> </div>
                <div class="col text-center text-sm-left">
                  <div class="">
                    <h5 class="text-3 text-body">Tienes preguntas técnicas</h5>
                    <p class="text-muted mb-0">Conctáctanos y te guiaremos en tu operación. <a class="btn-link" href="https://api.whatsapp.com/send?phone=51944001458&text=Hola%20necesito%20ayuda%20con%20una%20operaci%C3%B3n" target="_blank">Click aqui<span class="text-1 ml-1"><i class="fas fa-chevron-right"></i></span></a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Can't find end -->

  </div>
  <!-- Content end -->

@endsection