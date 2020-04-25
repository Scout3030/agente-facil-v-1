@if($operation_type_id == App\OperationType::TRANSFER)
<button class="btn-icon-vertical btn-square btn-transition btn btn-outline-warning">
	<i class="lnr-sync btn-icon-wrapper"> </i>
	<span class="badge badge-primary badge-dot badge-dot-lg badge-dot-inside"> </span>Tansferencia
</button>
@endif

@if($operation_type_id == App\OperationType::PAYMENT)
<button class="btn-icon-vertical btn-square btn-transition btn btn-outline-info">
	<i class="lnr-arrow-right-circle btn-icon-wrapper"> </i>
	<span class="badge badge-success badge-dot badge-dot-inside"> </span>Pago
</button>
@endif