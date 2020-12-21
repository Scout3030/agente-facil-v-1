<!-- Secondary Menu
============================================= -->
<div class="bg-primary">
	<div class="container d-flex justify-content-center">
		<ul class="nav secondary-nav">
			<li class="nav-item"> <a class="nav-link @if (\Request::is('perfil')) active @endif" href="{{route('user.profile')}}">Mi perfil</a></li>
			<li class="nav-item"> <a class="nav-link @if (\Request::is('mis-cuentas')) active @endif" href="{{route('user.accounts')}}">Mis cuentas</a></li>
		</ul>
	</div>
</div>
<!-- Secondary Menu end -->