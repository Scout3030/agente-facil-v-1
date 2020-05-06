@extends('layouts.admin-app')

@section('content')

<div class="row">
	<div class="col-md-6">
		<div id="accordion" class="accordion-wrapper mb-3">
			@foreach(App\Question::orderBy('title', 'asc')->get() as $faq)
			<div class="card">
				<div id="heading{{$faq->id}}" class="card-header">
					<button type="button" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}" class="text-left m-0 p-0 btn btn-link btn-block">
					<h5 class="m-0 p-0">{{$faq->title}}</h5>
					</button>
				</div>
				<div data-parent="#accordion" id="collapse{{$faq->id}}" aria-labelledby="heading{{$faq->id}}" class="collapse">
					<div class="card-body">
						{{$faq->description}}
						<div class="d-flex float-right">
						<a href="{{route('admin.faq.edit', $faq->id)}}" class="mb-2 mr-2 btn btn-info">Editar</a>
						<form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST">
						    @csrf
						    @method('delete')
						    <button type="submit" class="mb-2 mr-2 btn btn-danger">Eliminar</button>
						</form>
						</div>
					</div>
				</div>
			</div>
			@endforeach
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
				<h5 class="card-title">Agregar Pregunta frecuente</h5>
				<form class=""
					action="{{$question->id ? route('admin.faq.update', $question->id) : route('admin.faq.store')}}"
					method="POST"
					novalidate
				>
					@csrf
					@if($question->id)
					@method('put')
					@endif
					<div class="position-relative form-group">
						<label class="">Título</label>
						<input name="title" placeholder="Título" type="text" class="form-control" autocomplete="off" value="{{$question->id ? $question->title : old('title')}}">
					</div>
					<div class="position-relative form-group">
						<label class="">Descripción</label>
						<textarea name="description" class="form-control">{{$question->id ? $question->description : old('description')}}</textarea>
					</div>
					<button class="mt-1 btn btn-primary">{{$btn}}</button>
				</form>
				<button class="btn btn-lg btnAlert">Lanzar alerta</button>
			</div>
		</div>
	</div>
</div>

@endsection

