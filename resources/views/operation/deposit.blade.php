@extends('layouts.app')

@section('content')
<!-- Content
============================================= -->
<div id="content" class="py-4">
	<div class="container">
		<h2 class="font-weight-400 text-center mt-3 mb-4">Deposita</h2>
		<div class="row">
			<div class="col-md-8 col-lg-6 col-xl-5 mx-auto">
				@if($type == App\OperationType::TRANSFER)
				<deposit-transfer-form></deposit-transfer-form>
				@elseif($type == App\OperationType::PAYMENT)
				<deposit-payment-form></deposit-payment-form>
				@endif
			</div>
		</div>
	</div>
</div>
<!-- Content end -->
@endsection