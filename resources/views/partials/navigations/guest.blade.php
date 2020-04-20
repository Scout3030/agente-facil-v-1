<!-- Primary Navigation
  ============================== -->
  <nav class="primary-menu navbar navbar-expand-lg">
    <div id="header-nav" class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li @if (\Request::is('nosotros')) class="active" @endif>
          <a href="{{route('about')}}">Nosotros</a>
        </li>
        <li @if (\Request::is('precios')) class="active" @endif>
          <a href="{{route('prices')}}">Precios</a>
        </li>
        <li @if (\Request::is('preguntas-frecuentes')) class="active" @endif>
          <a href="{{route('faq')}}">Preguntas frecuentes</a>
        </li>
        <li @if (\Request::is('opiniones')) class="active" @endif>
          <a href="{{route('reviews')}}">Opiniones</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Primary Navigation end -->
</div>
<div class="header-column justify-content-end">
  <!-- Login & Signup Link
  ============================== -->
  <nav class="login-signup navbar navbar-expand">
    <ul class="navbar-nav">
      <li><a href="{{route('login')}}">Ingresa</a> </li>
      <li class="align-items-center h-auto ml-sm-3"><a class="btn btn-primary d-none d-sm-block" href="{{route('register')}}">Regístrate</a></li>
    </ul>
  </nav>
  <!-- Login & Signup Link end -->