@extends('layouts.app')

@section('content')

@include('partials.operation.menu')

<!-- Content
============================================= -->
<div id="content" class="py-4">
	<div class="container">
		<h2 class="font-weight-400 text-center mt-3">Realizar pagos</h2>
		<p class="text-4 text-center mb-4">Realiza pagos en de convenios de otros bancos</p>
		<div class="row">
			<div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
				<div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
					@if($userAccounts->count() < 1)
					<div class="alert alert-info fade show" role="alert">
						Para iniciar tus operaciones debes asociar una cuenta bancaria.
					</div>
					@endif
					<h3 class="text-5 font-weight-400 mb-3">Pagar</h3>
					<button onclick="window.location.replace('{{route('user.accounts')}}')" class="btn btn-sm mb-3 float-right" style="background: #00E2CC; color: #fff">Añadir cuenta</button>
					<!-- Send Money Form
					============================================= -->
					<payment-form :banks="{{$banks}}"></payment-form>
					<!-- Send Money Form end -->
				</div>
			</div>
		</div>
	</div>
</div>

@endsection