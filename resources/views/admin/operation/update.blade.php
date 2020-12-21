@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Completar operación', 'icon' => 'pe-7s-paint'])
@endsection

@section('content')

<div class="row">
	@if($operation->transfer_code == null)
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body"><h5 class="card-title">Información de la operación</h5>
				<form
					action="{{route('admin.operation.completeoperationstatus', $operation->id)}}"
					method="POST"
					novalidate
					>
					@csrf
					@method('PUT')
					<div class="alert alert-info" role="alert">
						<h4 class="alert-heading">Operación a realizar: {{$operation->operationType->type}}</h4>
						@if($operation->operationType->id == App\Operation::TRANSFER)


						@if($operation->transfers[1]->account_id != null)
						{{--Si la cuenta es propia--}}
						<p>Al banco: {{$operation->transfers[1]->account->bank->name}}</p>
						<p>A la cuenta: {{$operation->transfers[1]->account->number}}</p>

						@else
						{{--Si la cuenta es de terceros--}}
						<p>Al banco: {{$operation->transfers[1]->bank->name}}</p>
						<p>A la cuenta: {{$operation->transfers[1]->account_number}}</p>

						@endif

						@endif

						@if($operation->operationType->id == App\Operation::PAYMENT)
						<p>Al banco: {{$operation->payment->bankOperation->bank->name}}</p>
						<p>Al convenio: {{$operation->payment->bankOperation->name}}</p>
						<p>Con el código: {{$operation->payment->code}}</p>
						@endif

						<p>Por el monto de S/{{$operation->amount}}</p>
					</div>
					<div class="position-relative form-group">
						<label for="name" class="">Código de operación</label>
						<input name="transfer_code" placeholder="N° de operación" type="text" class="form-control" value="">
					</div>
					<button class="mt-1 btn btn-primary float-right">Completar operación</button>
				</form>
			</div>
		</div>
	</div>
	@else
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body">
				<div id="message"></div>
				<h5 class="card-title">Operación confirmada</h5>
				<p>El número de operación registrado es el:
					<strong>{{$operation->transfer_code}}</strong>
				</p>
				<button class="mt-1 btn btn-primary btnEmail" data-id="{{$operation->id}}">Enviar correo de confirmación</button>
			</div>
		</div>
	</div>
	@endif
</div>

@endsection

@push('scripts')
	<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			let message = $('#message')
			$(document).on("click", '.btnEmail', function (e) {
                e.preventDefault();
                const id = $(this).data('id');
                jQuery.ajax({
                    url: '{{ route('admin.operation.send_confirmation_message') }}',
                    type: 'POST',
                    headers: {
                        'x-csrf-token': $("meta[name=csrf-token]").attr('content')
                    },
                    data: {
                        id : id
                    },
                    success: (res) => {
                    	console.log("res", res);
                        if(res.res) {
                            // modal.find('#modalAction').hide();
                            message.html('<div class="alert alert-success">{{ __("Confirmación enviada correctamente") }}</div>');
                        } else {
                            message.html('<div class="alert alert-danger">{{ __("Ha ocurrido un error enviando la confirmación") }}</div>');
                        }
                    }
                })
                // modal.find('.modal-title').text('{{ __("Enviar mensaje") }}');
                // modal.find('#modalAction').text('{{ __("Enviar mensaje") }}').show();
                // let $form = $("<form id='studentMessage'></form>");
                // $form.append(`<input type="hidden" name="user_id" value="${id}" />`);
                // $form.append(`<textarea class="form-control" name="message"></textarea>`);
                // modal.find('.modal-body').html($form);
                // modal.modal();
            });
		})
	</script>
@endpush