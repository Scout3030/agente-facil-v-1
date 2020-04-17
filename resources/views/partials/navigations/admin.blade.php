<!-- Primary Navigation
  ============================== -->
  <nav class="primary-menu navbar navbar-expand-lg">
    <div id="header-nav" class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
        <li class="active"><a href="{{route('operation.history')}}">Nosotros</a></li>
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
      @include('partials.navigations.logout')
    </ul>
  </nav>
  <!-- Login & Signup Link end -->