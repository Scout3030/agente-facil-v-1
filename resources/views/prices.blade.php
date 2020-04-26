@extends('layouts.app')

@section('content')

<!-- Content
  ============================================= -->
  <div id="content">

    <section class="section pt-5 pb-0">
      <div class="container">
        <div class="row">

          <!-- Currency Conversion
          ============================================= -->
          <div class="col-md-6 mb-5">
            <div class="bg-white shadow-sm rounded p-4 text-center">
              <div class="featured-box style-4 py-2">
                <div class="featured-box-icon text-light border rounded-circle shadow-none"> <i class="fas fa-exchange-alt"></i> </div>
                <h3 class="text-body text-7 mb-3">Transferencia entre bancos</h3>
                <!-- <p class="text-4 line-height-4">ith a wide variety of options for deposit your account. There is always an option that is right for you.</p> -->
                <div class="text-primary text-10 pt-3 pb-4 mb-2">S/1.00 hasta S/199</div>
                <div class="text-primary text-10 pt-3 pb-4 mb-2">S/2.00 hasta S/997</div>
                <!-- <a href="#" class="text-muted btn-link text-4">Learn more<i class="fas fa-chevron-right text-2 ml-2"></i></a>  -->
              </div>
            </div>
          </div>
          <!-- Currency Conversion end -->

          <!-- Deposit Funds
          ============================================= -->
          <div class="col-md-6 mb-5">
            <div class="bg-white shadow-sm rounded p-4 text-center">
              <div class="featured-box style-4 py-2">
                <div class="featured-box-icon text-light border rounded-circle shadow-none"> <i class="fas fa-upload"></i> </div>
                <h3 class="text-body text-7 mb-3">Pagos</h3>
                <!-- <p class="text-4 line-height-4">With a wide variety of options for deposit your account. There is always an option that is right for you.</p> -->
                <div class="text-primary text-10 pt-3 pb-4 mb-2">S/1.00 por cada S/500</div>
                <!-- <a href="#" class="text-muted btn-link text-4">Learn more<i class="fas fa-chevron-right text-2 ml-2"></i></a>  -->
              </div>
            </div>
          </div>
          <!-- Deposit Funds end -->

        </div>
      </div>
    </section>

    <!-- Content
    ============================================= -->
    <section class="section bg-primary">
      <div class="container text-center">
        <h2 class="text-9 text-white"> Crea tu cuenta en minutos.</h2>
        <p class="text-5 text-white mb-4">Envía y recive dinero entre bancos, realiza pagos en más de 20 bancos en todo el Perú con comisiones mínimas y desde la comodidad de tu casa.</p>
        <a href="{{route('register')}}" class="btn btn-light">Crear cuenta</a> </div>
    </section>
    <!-- Banner end -->

  </div>
  <!-- Content end -->

@endsection