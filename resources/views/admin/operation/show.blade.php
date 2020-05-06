@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Resumen de operación', 'icon' => '
pe-7s-next-2'])
@endsection

@section('content')

<div class="row">
	<div class="col-12">
		<div class="main-card mb-3 card">
            <div class="card-body">
            	<h5 class="card-title">Operación</h5>
                <ul class="nav">
                	@switch($operation->status)
					    @case(App\Operation::CANCELLED)
					        <button class="mb-2 mr-2 btn btn-danger active">Cancelada</button>
					        @if($operation->operator != null)
					        <button type="button" class="mb-2 mr-2 btn btn-info">{{$operation->operator->name}}</button>
					        @endif
					        @break

					    @case(App\Operation::INPROCESS)
					        <button class="mb-2 mr-2 btn btn-warning active">En proceso</button>
					        @if($operation->operator != null)
					        <button type="button" class="mb-2 mr-2 btn btn-info">{{$operation->operator->name}}</button>
					        @endif
					        @break

					    @case(App\Operation::COMPLETED)
					        <button class="mb-2 mr-2 btn btn-success active">Finalizada</button>
					        @if($operation->operator != null)
					        <button type="button" class="mb-2 mr-2 btn btn-info">{{$operation->operator->name}}</button>
					        @endif
					        <button class="ml-auto btn btn-lg btn-alternate btnEmail" data-id="{{$operation->id}}">Enviar email de confirmación <i class="fa fa-envelope"></i></button>

                			@if($operation->mail == App\Operation::SENT)
							<div class="mb-2 mr-2 badge badge-focus">Mail enviado</div>
                			@endif
                			<div id="message"></div>
					        @break
					@endswitch

                </ul>
            </div>
        </div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body"><h5 class="card-title">Información de la operación</h5>
				<div class="mb-3 text-white card-border bg-dark card">
					@if($operation->operationType->id == App\Operation::PAYMENT)
					<div class="card-header">
						<i class="header-icon lnr-screen icon-gradient bg-warm-flame"> </i>Pago
					</div>
					<div class="card-body">
						<p class="mb-1">Al banco: {{$operation->payment->bankOperation->bank->name}}</p>
						<p class="mb-1">Al convenio: {{$operation->payment->bankOperation->name}}</p>
						<p class="mb-1">Con el código: {{$operation->payment->code}}</p>

						<p class="mb-1">Por el monto de <strong>S/{{$operation->amount}}</strong></p>
						<p class="mb-1">Comisión <strong>S/{{$operation->comission}}</strong></p>
						<p class="mb-1">Total <strong>S/{{$operation->amount + $operation->comission}}</strong></p>
						<br>
						<p class="mb-1">Usuario {{$operation->user->name}}</p>
					</div>
					<div class="d-block card-footer">
						<button class="btn btn-warning btn-block">Fondos depositados a cuenta del banco <strong>{{$operation->payment->bankAccount->bank->name}}</strong></button>
					</div>
					@endif

					@if($operation->operationType->id == App\Operation::TRANSFER)
					<div class="card-header">
						<i class="header-icon lnr-screen icon-gradient bg-warm-flame"> </i>Transferencia
					</div>
					<div class="card-body">
						@if($operation->transfer->toAccount != null)
						<p class="mb-1">Al banco: {{$operation->transfer->toAccount->bank->name}}</p>
						<p class="mb-1">A la cuenta: {{$operation->transfer->toAccount->number}}</p>
						@else
						{{--Si la cuenta es de terceros--}}
						<p class="mb-1">Al banco: {{$operation->transfer->bank->name}}</p>
						<p class="mb-1">A la cuenta: {{$operation->transfer->account_number}}</p>
						@endif

						<p class="mb-1">Por el monto de <strong>S/{{$operation->amount}}</strong></p>
						<p class="mb-1">Comisión <strong>S/{{$operation->comission}}</strong></p>
						<p class="mb-1">Total <strong>S/{{$operation->amount + $operation->comission}}</strong></p>
						<br>

						<p class="mb-1">Usuario {{$operation->user->name}}</p>
					</div>
					<div class="d-block card-footer">
						<button class="btn btn-warning btn-block">Fondos depositados a cuenta del banco <strong>{{$operation->transfer->fromAccount->bank->name}}</strong></button>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			@if($operation->status != App\Operation::COMPLETED)
			<div class="card-body"><h5 class="card-title">Registrar como cancelada</h5>
				<form action="{{ route('admin.operation.canceloperation') }}" method="POST">
				    @csrf
				    @method('put')
				    <input type="hidden" name="id" value="{{$operation->id}}">
				    <button type="submit" class="mb-2 mr-2 btn btn-danger btn-block">Cancelar</button>
				</form>
			</div>
			@endif

			<div class="card-body"><h5 class="card-title">Registrar código de operación</h5>
				<form
					action="{{route('admin.operation.updateDepositCode', $operation->id)}}"
					method="POST"
					novalidate
					>
					@csrf
					@method('PUT')
					<div class="position-relative form-group">
						<label for="name" class="">Registrar código de depósito a cuenta de la plataforma</label>
						<input name="deposit_code" placeholder="N° de operación" type="text" class="form-control" value="{{$operation->deposit_code ? $operation->deposit_code : old('deposit_code')}}"
						{{$operation->deposit_code == null ? '' : 'readonly'}} autocomplete="off">
					</div>
					<button class="mt-1 btn btn-primary float-right">Registrar</button>
				</form>
			</div>

			<div class="card-body">
				<form
					action="{{route('admin.operation.updateTransferCode', $operation->id)}}"
					method="POST"
					novalidate
					>
					@csrf
					@method('PUT')
					<div class="position-relative form-group">
						<label for="name" class="">Código de operación final del cliente</label>
						<input name="transfer_code" placeholder="N° de operación" type="text" class="form-control" value="{{$operation->transfer_code ? $operation->transfer_code : old('deposit_code')}}"
						{{$operation->deposit_code != null && $operation->transfer_code == null ? '' : 'readonly'}} autocomplete="off">
					</div>
					<button class="mt-1 btn btn-success float-right">Completar operación</button>
				</form>
			</div>
		</div>
	</div>

</div>

@endsection


@push('scripts')
	<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			let message = $('#message')
			$(document).on("click", '.btnEmail', function (e) {
                e.preventDefault();
                message.html('<div class="loader-wrapper d-flex justify-content-center align-items-center"><div class="loader"><div class="ball-pulse"><div></div><div></div><div></div></div></div></div>');
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
                        if(res.res) {

                            message.html('<button class="btn btn-success">{{ __("Confirmación enviada correctamente") }}</button>');
                        } else {
                            message.html('<button class="btn btn-danger">{{ __("Ha ocurrido un error enviando la confirmación") }}</button>');
                        }
                    }
                })
            });
		})
	</script>
@endpush