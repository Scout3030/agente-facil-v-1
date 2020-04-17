<!-- Secondary menu
============================================= -->
<div class="bg-primary">
	<div class="container d-flex justify-content-center">
		<ul class="nav secondary-nav">
			<li class="nav-item"> <a class="nav-link @if (\Request::is('transferencia-interbancaria')) active @endif" href="{{route('operation.transfer')}}">Transferencia</a></li>
			<li class="nav-item"> <a class="nav-link @if (\Request::is('pago-interbancario')) active @endif" href="{{route('operation.payment')}}">Pagos</a></li>
		</ul>
	</div>
</div>
<!-- Secondary menu end -->