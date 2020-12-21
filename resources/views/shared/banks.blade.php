

<!-- Banks
============================================= -->
<section class="section bg-white">
  <div class="container">
    <h2 class="text-9 text-center">Bancos</h2>
    <p class="text-4 text-center mb-5">Realiza operaciones en todos estos bancos</p>
    <div class="brands-grid separator-border">
      <div class="row align-items-center">
        @foreach(\App\Bank::whereStatus(App\Bank::PUBLISHED)->get() as $bank)

        <div class="col-6 col-sm-4 col-lg-2 text-center"><a href="javascript:void(0)"><img class="img-fluid" src="{{$bank->pathAttachment()}}" alt="{{$bank->name}}"></a></div>

        @endforeach

      </div>
    </div>
  </div>
</section>
<!-- Banks end -->