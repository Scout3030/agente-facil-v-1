@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Crear categoría', 'icon' => 'pe-7s-menu'])
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
			<div class="card-body"><h5 class="card-title">Información de la categoría</h5>
				<form
					action="{{$category->id ? route('admin.category.update', $category->slug) : route('admin.category.store') }}"
					method="POST"
					enctype="multipart/form-data"
					novalidate
					>
					@csrf
					@if($category->id)
					@method('PUT')
					@endif
					<div class="position-relative form-group">
						<label for="name" class="">Categoría</label>
						<input name="name" id="name" placeholder="Categoría" type="text" class="form-control" value="{{$category->id ? $category->name : old('name')}}">
					</div>
					<div class="position-relative form-group">
						<label for="picture" class="">Imagen</label>
						<input name="picture" id="picture" type="file" class="form-control-file" multiple="multiple" required>
						<small class="form-text text-muted">Seleciona una o más imágenes referentes a la categoría.</small>
					</div>
					<button class="mt-1 btn btn-primary">{{$text}}</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
