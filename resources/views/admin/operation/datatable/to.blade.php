@if($operation_type_id == App\Operation::TRANSFER)

<div class="card text-white card-body bg-warning">
	@if($transfers[1]['account_id'] != null)
	{{--SI la cuenta es propia--}}
	<h5 class="text-white card-title">Banco: {{$transfers[1]['account']['bank']['name']}}</h5>
	Cuenta: {{$transfers[1]['account']['number']}}
	<br>
	<strong>Destinatario:</strong> {{$transfers[1]['account']['name']}}
	@else
	{{--SI la cuenta es de terceros--}}
	<h5 class="text-white card-title">Banco: {{$transfers[1]['bank']['name']}}</h5>
	Cuenta: {{$transfers[1]['account_number']}}
	<br>
	<strong>Destinatario:</strong> {{$transfers[1]['name']}}
	@endif
</div>

@endif

@if($operation_type_id == App\Operation::PAYMENT)

<div class="card text-white card-body bg-info">
	<h5 class="text-white card-title">Banco: {{$payment['bank_operation']['bank']['name']}}</h5>
	<p>Convenio: {{$payment['bank_operation']['name']}}</p>

	<p>Código: {{$payment['code']}}</p>
</div>

@endif