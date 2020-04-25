@extends('layouts.admin-app')

@section('content')

<div class="row">
	<div class="col-md-8">
		<div class="main-card mb-3 card">
		    <div class="card-body">
		        <table style="width: 100%;" id="payments-table" class="table table-hover table-striped table-bordered">
		            <thead>
		            <tr>
		                <th>id</th>
		                <th>Convenio</th>
		                <th>Código</th>
		                <th>Banco</th>
		                <th>Estado</th>
		                <th>Acciones</th>
		            </tr>
		            </thead>
		            <tbody>

		            </tbody>
		            <tfoot>
		            <tr>
		                <th>id</th>
		                <th>Convenio</th>
		                <th>Código</th>
		                <th>Banco</th>
		                <th>Estado</th>
		                <th>Acciones</th>
		            </tr>
		            </tfoot>
		        </table>
		    </div>
		</div>
	</div>

	<div class="col-md-4">
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
				<h5 class="card-title">Agregar convenio</h5>
				<form class=""
					action="{{$bankOperation->id ? route('admin.payment.update') : route('admin.payment.store')}}"
					method="POST"
					novalidate
				>
					@csrf
					@if($bankOperation->id)
					@method('put')
					@endif
					<div class="position-relative form-group">
						<label class="">Nombre</label>
						<input name="name" placeholder="Convenio" type="text" class="form-control" autocomplete="off" value="{{$bankOperation->id ? $bankOperation->name : old('name')}}">
					</div>
					<div class="position-relative form-group">
						<label class="">Dato para el pago</label>
						<input name="requirement" class="form-control" placeholder="Dato requerido" value="{{$bankOperation->id ? $bankOperation->requirement : old('requirement')}}"></input>
					</div>
					<div class="position-relative form-group">
						<label class="">Banco del convenio</label>
						<select name="bank_id" multiple="multiple" class="multiselect-dropdown form-control">
			                <optgroup label="Bancos">
			                	@foreach(App\Bank::orderBy('name', 'asc')->get() as $bank)
			                    <option value="{{$bank->id}}" {{$bankOperation->bank_id == $bank->id ? 'selected' : ''}}>{{$bank->name}}</option>
			                    @endforeach
			                </optgroup>
			            </select>
					</div>
					<div class="position-relative form-group">
						<label class="">Icono</label>
						<input name="icon" placeholder="tarjeta-oh" type="text" class="form-control" autocomplete="off" value="{{$bankOperation->id ? $bankOperation->icon : old('icon')}}">
					</div>
					<button class="mt-1 btn btn-primary">Crear</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        let dt;
        $(document).ready(function() {
            dt = $("#payments-table").DataTable({
                pageLength: 10,
                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.payment.datatable') }}',
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    {data: 'id', visible: false},
                    {data: 'name'},
                    {data: 'requirement'},
                    {data: 'bank.name'},
                    {data: 'status'},
                    {data: 'actions'}
                    // {data: 'actions'}
                ]
            });
        })
    </script>
@endpush