@if($operation_type_id == App\Operation::TRANSFER)

<div class="card text-white card-body bg-primary">
	<h5 class="text-white card-title">Banco: {{$transfer['from_account']['bank']['name']}}</h5>
	Cuenta: {{$transfer['from_account']['number']}}
	<br>
	Usuario: {{$transfer['from_account']['name']}}
</div>

@endif

@if($operation_type_id == App\Operation::PAYMENT)

<div class="card text-white card-body bg-primary">
	<h5 class="text-white card-title">Banco: {{$payment['bank_account']['bank']['name']}}</h5>
	Cuenta: {{$payment['bank_account']['number']}}
	<br>
	Usuario: {{$payment['bank_account']['name']}}
</div>

@endif