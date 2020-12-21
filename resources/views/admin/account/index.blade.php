@extends('layouts.admin-app')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="main-card mb-3 card">
            <admin-account-list></admin-account-list>
		</div>
	</div>

	<div class="col-md-6">
		@if ($errors->any())
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				<ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		@if (session('message'))
			<div class="alert alert-info alert-dismissible fade show" role="alert">
				{{session('message')}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<div class="main-card mb-3 card">
			<div class="card-body">
				<h5 class="card-title">Agregar cuenta</h5>
				<form class=""
					action="{{$account->id ? route('admin.account.update', $account->id) : route('admin.account.store')}}"
					method="POST"
					novalidate
				>
					@csrf
					@if($account->id)
					@method('put')
					@endif
					<div class="position-relative form-group">
                        <label class="">Banco</label>
                        <select name="bank_id" class="multiselect-dropdown form-control">
                            <optgroup label="Bancos">
                            	<option>Seleccione banco</option>
                            	@foreach($banks as $bank)
                                <option value="{{$bank->id}}" {{$bank->id == $account->bank_id
                                 ? 'selected' : ''}}>{{$bank->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
					<div class="position-relative form-group">
						<label class="">Número de cuenta</label>
						<input name="number" placeholder="9999 9999 9999 9999" type="text" class="form-control" autocomplete="off" value="{{$account->id ? $account->number : old('number')}}">
					</div>
					<div class="position-relative form-group">
						<label class="">Nombre del propietario</label>
						<input name="name" placeholder="Huamachuco Store" type="text" class="form-control" autocomplete="off" value="{{$account->id ? $account->name : old('name')}}">
					</div>
					<button class="mt-1 btn btn-primary">{{$btn}}</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
