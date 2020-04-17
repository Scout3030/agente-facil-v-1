<!-- Primary Navigation
============================== -->
<nav class="primary-menu navbar navbar-expand-lg ml-auto">
  <div id="header-nav" class="collapse navbar-collapse">
    <ul class="navbar-nav mr-auto">
      <li class="@if (\Request::is('historial')) active @endif"><a href="{{route('operation.history')}}">Historial</a></li>
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
    <li><a href="{{route('user.profile')}}">Mi perfil</a> </li>
    <li><a href="{{route('user.accounts')}}">Mis cuentas</a> </li>
    @include('partials.navigations.logout')
  </ul>
</nav>
<!-- Login & Signup Link end -->