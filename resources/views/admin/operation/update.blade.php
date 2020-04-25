@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Completar operación', 'icon' => 'pe-7s-paint'])
@endsection

@section('content')

<div class="row">
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
</div>

@endsection