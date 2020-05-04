@extends('layouts.admin-app')

@section('breadcrumb')
@include('admin.shared.breadcrumb', ['title' => 'Todas las operaciones', 'icon' => '
pe-7s-paint'])
@endsection

@section('content')
<div class="main-card mb-3 card">
    <div class="card-body">
        <table style="width: 100%;" id="operations-table" class="table table-hover table-striped table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>Operador</th>
                <th>Operación</th>
                <th>Desde</th>
                <th>Hacia</th>
                <th>Estado</th>
                <th>Acciones</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
                <th>id</th>
                <th>Operador</th>
                <th>Operación</th>
                <th>Desde</th>
                <th>Hacia</th>
                <th>Estado</th>
                <th>Acciones</th>
                <th>Fecha</th>
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
            dt = $("#operations-table").DataTable({
                pageLength: 25,
                lengthMenu: [ 5, 10, 25, 50, 75, 100 ],
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.operation.datatableall') }}',
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
                columns: [
                    {data: 'id', visible: false},
                    {data: 'operator'},
                    {data: 'operation'},
                    {data: 'from'},
                    {data: 'to'},
                    {data: 'status'},
                    {data: 'actions'},
                    {data: 'date'}
                ],
                order: [[ 7, "desc" ]]
            });

            setInterval( function () {
                dt.ajax.reload();
            }, 30000 );
        })
    </script>
@endpush