@extends('layouts.app')

@section('content')

<!-- Content
============================================= -->
<div id="content" class="py-4">
	<div class="container">
		<h2 class="font-weight-400 text-center mt-3 mb-4">Solo tomará unos minutos</h2>
		<div class="row">
			<div class="col-md-8 col-lg-6 col-xl-5 mx-auto">

				<!-- Request Money Success
				============================================= -->
				<div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
					<div class="text-center my-5">
						<p class="text-center text-success text-20 line-height-07"><i class="fas fa-check-circle"></i></p>
						<p class="text-center text-success text-8 line-height-07">¡Operación completada!</p>
					</div>
					<p class="text-center text-3 mb-4">Nuestro operador verificará los datos y realizará tu operación en los próximos 20 minutos <br> <a href="#">Gracias por utilizar nuestro servicio</a>.</p>
					<button onclick="window.location.replace('{{route('home')}}')" class="btn btn-primary btn-block">Realizar una nueva operación</button>
					<a href="{{route('operation.history')}}" class="btn btn-link btn-block"><i class="fas fa-share-square"></i> Ver detalles de operación</a href="#">
				</div>
				<!-- Request Money Success end -->
			</div>
		</div>
	</div>
</div>
<!-- Content end -->


@endsection

@push('scripts')
<script>
	localStorage.clear();
</script>
@endpush
