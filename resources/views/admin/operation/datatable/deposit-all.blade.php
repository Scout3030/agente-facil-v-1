<div class="card text-white card-body" style="background-color: rgb(51, 51, 51); border-color: rgb(51, 51, 51);">
	<h6 class="text-white card-title">N° operación: {{$deposit_code}}</h6>

	@if($operation_type_id == App\Operation::TRANSFER)

	Banco: {{$transfers[0]['account']['bank']['name']}}

	@endif

	@if($operation_type_id == App\Operation::PAYMENT)

	Banco: {{$payment['account']['bank']['name']}}

	@endif
	<br>
	Monto: {{$amount}}
	<br>
	Comisión: {{$comission}}
	<br>
	Total: S/{{$amount + $comission}}

</div>
