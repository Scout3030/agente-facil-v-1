@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Crear producto'])
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
			<div class="card-body"><h5 class="card-title">Información del producto</h5>
				<form
					action="{{$product->id ? route('admin.product.update', $product->slug) : route('admin.product.store') }}"
					method="POST"
					enctype="multipart/form-data"
					novalidate
					>
					@csrf
					@if($product->id)
					@method('PUT')
					@endif
					<div class="position-relative form-group">
						<label for="name" class="">Producto</label>
						<input name="name" id="name" placeholder="Producto" type="text" class="form-control" value="{{$product->id ? $product->name : old('name')}}">
					</div>
					<div class="position-relative form-group">
						<label for="short_description">Descripción corta</label>
                        <textarea rows="1" class="form-control autosize-input" style="max-height: 200px; height: 80px;" placeholder="Incluye datos que resuman la usabilidad del producto..." name="short_description">{{$product->id ? $product->name : old('short_description')}}</textarea>
					</div>
					<div class="position-relative form-group">
						<label for="long_description">Descripción larga</label>
                        <textarea rows="1" class="form-control autosize-input" style="max-height: 600px; height: 150px;" placeholder="Incluye datos detallados del producto" name="long_description">{{$product->id ? $product->name : old('long_description')}}</textarea>
					</div>
					<div class="position-relative form-group">
						<label for="keywords" class="">Palabras clave</label>
						<input name="keywords" id="keywords" placeholder="Ingrese palabras clave separadas por coma ( , )" type="text" class="form-control" value="{{$product->id ? $product->keywords : old('keywords')}}">
					</div>
					<div class="form-row">
						<div class="col-md-4">
							<div class="position-relative form-group">
								<label for="cost" class="">Costo (S/)</label>
								<input name="cost" id="cost" type="number" class="form-control" step="0.01" min="0.01" value="{{$product->id ? $product->cost : old('cost')}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="position-relative form-group">
								<label for="price" class="">Precio (S/)</label>
								<input name="price" id="price" type="number" class="form-control" step="0.01" min="0.01" value="{{$product->id ? $product->price : old('price')}}">
							</div>
						</div>
						<div class="col-md-4">
							<div class="position-relative form-group">
								<label for="stock" class="">Stock</label>
								<input name="stock" id="stock" type="number" class="form-control" min="1" value="{{$product->id ? $product->stock : old('stock')}}">
							</div>
						</div>
					</div>
					<div class="position-relative form-group">
						<label for="picture" class="">Imágenes</label>
						<input name="picture[]" id="picture" type="file" class="form-control-file" multiple="multiple">
						<small class="form-text text-muted">Seleciona una o más imágenes referentes al producto.</small>
					</div>
					<input type="hidden" name="category_id" value="{{$product->id ? $product->category_id : '' }}">
					<input type="hidden" name="color_id" value="{{$product->id ? $product->color_id : '' }}">
					<button class="mt-1 btn btn-primary">{{$btnText}}</button>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Categoría</h5>
                <div class="position-relative form-group">
                    <div>
                        <div class="custom-radio custom-control">
                        	<input type="radio" id="category_1" name="category" class="custom-control-input" value="1">
                        	<label class="custom-control-label" for="category_1">
                        		Categoría 1
                        	</label>
                        </div>
                        <div class="custom-radio custom-control">
                        	<input type="radio" id="category_2" name="category" class="custom-control-input" value="2">
                        	<label class="custom-control-label" for="category_2">
                        		Categoría 2
                        	</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">Color</h5>
                <div class="position-relative form-group">
                    <div>
                        <div class="custom-radio custom-control">
                        	<input type="radio" id="color_1" name="color" class="custom-control-input bg-danger" value="1">
                        	<label class="custom-control-label" for="color_1">Select this custom radio
                        	</label>
                        </div>
                        <div class="custom-radio custom-control">
                        	<input type="radio" id="color_2" name="color" class="custom-control-input" value="2">
                        	<label class="custom-control-label" for="color_2">Or
                            this one
                        	</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection

@push('scripts')
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script>
	$('input:radio[name=color]').on('click', function(){
		var color_id = $(this).val()
		$('input[name=color_id]').val(parseInt(color_id))
	})
	$('input:radio[name=category]').on('click', function(){
		var category_id = $(this).val()
		$('input[name=category_id]').val(parseInt(category_id))
	})
</script>
@endpush