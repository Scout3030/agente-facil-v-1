@if($status == App\BankOperation::PUBLISHED)
<div class="mb-2 mr-2 badge badge-pill badge-success">Activo</div>

@endif
@if($status == App\BankOperation::UNPUBLISHED)
<div class="mb-2 mr-2 badge badge-pill badge-danger">Inactivo</div>
@endif