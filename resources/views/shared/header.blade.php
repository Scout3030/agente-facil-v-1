<!-- Header
============================================= -->
<header id="header">
  <div class="container">
    <div class="header-row">
      <div class="header-column justify-content-start">
        <!-- Logo
        ============================= -->
        <div class="logo"> <a class="d-flex" href="{{route('home')}}" title="Agente Simple"><img src="{{asset('assets/images/logo.png')}}" alt="Agente Simple Logo"></a> </div>
        <!-- Logo end -->
        <!-- Collapse Button
        ============================== -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
        <!-- Collapse Button end -->

        <!-- Primary Navigation
        ============================== -->
        @include('partials.navigations.'.App\User::navigation())
        <!-- Login & Signup Link end -->
      </div>
    </div>
  </div>
</header>
<!-- Header End -->