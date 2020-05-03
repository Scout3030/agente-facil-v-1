<div class="card text-white card-body" style="background-color: rgb(51, 51, 51); border-color: rgb(51, 51, 51);">
	<h6 class="text-white card-title">N° operación: {{$deposit_code}}</h6>

	@if($operation_type_id == App\Operation::TRANSFER)

	Banco: {{$transfer['from_account']['bank']['name']}}

	@endif

	@if($operation_type_id == App\Operation::PAYMENT)

	Banco: {{$payment['bank_account']['bank']['name']}}

	@endif
	<br>
	Monto: {{$amount}}
	<br>
	Comisión: {{$comission}}
	<br>
	Total: S/{{$amount + $comission}}

</div>

@if($deposit_code_status == App\Operation::DEPOSITINPROCESS)
<form action="{{ route('admin.operation.acreditdeposit') }}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$id}}">
    <button type="submit" class="btn btn-success btn-block mt-3">Acreditar</button>
</form>
@endif