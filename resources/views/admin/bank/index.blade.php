@extends('layouts.admin-app')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div class="main-card mb-3 card">
            <admin-bank-list></admin-bank-list>
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
				<h5 class="card-title">Agregar banco</h5>
				<form class=""
					action="{{$bank->id ? route('admin.bank.update', $bank->id) : route('admin.bank.store')}}"
					method="POST"
					enctype="multipart/form-data"
					novalidate
				>
					@csrf
					@if($bank->id)
					@method('put')
					@endif
					<div class="position-relative form-group">
						<label class="">Nombre</label>
						<input name="name" placeholder="Banco" type="text" class="form-control" autocomplete="off" value="{{$bank->id ? $bank->name : old('name')}}">
					</div>
					<div class="position-relative form-group">
						<label class="">Descripción</label>
						<textarea name="description" class="form-control">{{$bank->id ? $bank->description : old('description')}}</textarea>
					</div>
					<div class="position-relative form-group">
						<label class="">Logo</label>
						<input name="logo" type="file" class="form-control-file">
						<p>Las dimensiones recomendadas son 200x150 px</p>
					</div>
					<div class="position-relative form-group">
						<label class="">Icono</label>
						<input name="icon" placeholder="caja-huancayo" type="text" class="form-control" autocomplete="off" value="{{$bank->id ? $bank->icon : old('icon')}}">
					</div>
					<button class="mt-1 btn btn-primary">{{$btn}}</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection
