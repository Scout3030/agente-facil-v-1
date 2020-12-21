<!-- Primary Navigation
  ============================== -->
  <nav class="primary-menu navbar navbar-expand-lg">
    <div id="header-nav" class="collapse navbar-collapse">
      <ul class="navbar-nav mr-auto">
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
      <li><a href="{{route('admin.index')}}">Panel administrativo</a> </li>
      @include('partials.navigations.logout')
    </ul>
  </nav>
  <!-- Login & Signup Link end -->