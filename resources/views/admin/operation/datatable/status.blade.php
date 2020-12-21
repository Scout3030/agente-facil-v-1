@if($status == App\Operation::COMPLETED)
<div class="mb-2 mr-2 badge badge-pill badge-success">Completada</div>
@endif
@if($status == App\Operation::INPROCESS)
<div class="mb-2 mr-2 badge badge-pill badge-warning">En proceso</div>
@endif
@if($status == App\Operation::CANCELLED)
<div class="mb-2 mr-2 badge badge-pill badge-danger">Cancelada</div>
@endif
