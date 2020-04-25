@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Todos los productos', 'icon' => 'pe-7s-box1'])
@endsection

@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <table style="width: 100%;" id="products-table" class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <th>id</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@push('scripts')
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        let dt;
        $(document).ready(function() {
            dt = $("#products-table").DataTable({
                pageLength: 5,
                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.product.datatable') }}',
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    {data: 'id', visible: false},
                    {data: 'name'},
                    {data: 'short_description'},
                    {data: 'cost'},
                    {data: 'price'},
                    {data: 'stock'},
                    {data: 'actions'}
                ]
            });
        })
    </script>
@endpush