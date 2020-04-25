@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Crear color', 'icon' => 'pe-7s-paint'])
@endsection

@section('content')

@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
        <h6 class="alert-heading"><strong>{{ session('message') }}</strong></h6>
    	<p>{{ session('description') }}</p>
    </div>
@endif
<div class="row">
	<div class="col-md-6">
		<div class="main-card mb-3 card">
			<div class="card-body"><h5 class="card-title">Información del color</h5>
				<form
					action="{{$color->id ? route('admin.color.update', $color->slug) : route('admin.color.store') }}"
					method="POST"
					enctype="multipart/form-data"
					novalidate
					>
					@csrf
					@if($color->id)
					@method('PUT')
					@endif
					<div class="position-relative form-group">
						<label for="name" class="">Color</label>
						<input name="name" id="name" placeholder="Categoría" type="text" class="form-control" value="{{$color->id ? $color->name : old('name')}}">
					</div>
					<button class="mt-1 btn btn-primary">{{$text}}</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
