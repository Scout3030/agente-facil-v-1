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
              <div class="col-md-6">
                <div class="accordion accordion-alternate" id="popularTopics">
                  <div class="card">
                    <div class="card-header" id="heading1">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">I forgot the password for my account.</a> </h5>
                    </div>
                    <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#popularTopics">
                      <div class="card-body"> Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="heading2">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">How do I withdraw funds from my account?</a> </h5>
                    </div>
                    <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#popularTopics">
                      <div class="card-body"> Iisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="heading3">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">How do I link bank account to my account?</a> </h5>
                    </div>
                    <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#popularTopics">
                      <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="heading4">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">How do I confirm the email address on my account?</a> </h5>
                    </div>
                    <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#popularTopics">
                      <div class="card-body"> Iisque Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="heading5">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">How do I receive payments?</a> </h5>
                    </div>
                    <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#popularTopics">
                      <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="accordion accordion-alternate" id="popularTopics2">
                  <div class="card">
                    <div class="card-header" id="heading6">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">How Can I View My Payments History?</a> </h5>
                    </div>
                    <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#popularTopics2">
                      <div class="card-body"> Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="heading7">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapse7">Where is my refund?</a> </h5>
                    </div>
                    <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#popularTopics2">
                      <div class="card-body"> Iisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Mutat tacimates id sit. Ridens mediocritatem ius an, eu nec magna imperdiet. </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="heading8">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapse8">How do I request payments or send an invoice?</a> </h5>
                    </div>
                    <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#popularTopics2">
                      <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="heading9">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapse9">Forgot my password! What next?</a> </h5>
                    </div>
                    <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#popularTopics2">
                      <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="heading10">
                      <h5 class="mb-0"> <a href="#" class="collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapse10">Closing Your Account</a> </h5>
                    </div>
                    <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#popularTopics2">
                      <div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>
                    </div>
                  </div>
                </div>
              </div>
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