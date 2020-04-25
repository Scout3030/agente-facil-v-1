@if($operation_type_id == App\Operation::TRANSFER)

<div class="card text-white card-body bg-primary">
	<h5 class="text-white card-title">Banco: {{$transfers[0]['account']['bank']['name']}}</h5>
	Cuenta: {{$transfers[0]['account']['number']}}
	<br>
	Usuario: {{$transfers[0]['account']['name']}}
</div>

@endif

@if($operation_type_id == App\Operation::PAYMENT)

<div class="card text-white card-body bg-primary">
	<h5 class="text-white card-title">Banco: {{$payment['account']['bank']['name']}}</h5>
	Cuenta: {{$payment['account']['number']}}
	<br>
	Usuario: {{$payment['account']['name']}}
</div>

@endif