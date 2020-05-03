@if($operation_type_id == App\Operation::TRANSFER)

<div class="card text-white card-body bg-warning">
	@if($transfer['to_account'] != null)
	{{--SI la cuenta es propia--}}
	<h5 class="text-white card-title">Banco: {{$transfer['to_account']['bank']['name']}}</h5>
	Cuenta: {{$transfer['to_account']['number']}}
	<br>
	<strong>Destinatario:</strong> {{$transfer['to_account']['name']}}
	@else
	{{--SI la cuenta es de terceros--}}
	<h5 class="text-white card-title">Banco: {{$transfer['to_bank']['name']}}</h5>
	Cuenta: {{$transfer['to_account_number']}}
	<br>
	<strong>Destinatario:</strong> {{$transfer['to_name']}}
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