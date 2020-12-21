

<form action="{{ route('admin.payment.status', $id) }}" method="POST">
    @csrf
    @method('put')
    @if($status == App\BankOperation::PUBLISHED)
    <button class="mb-2 mr-2 btn btn-alternate active">Desactivar</button>
    @endif
    @if($status == App\BankOperation::UNPUBLISHED)
    <button class="mb-2 mr-2 btn btn-alternate active">Activar</button>
    @endif
</form>
<button class="mb-2 mr-2 btn btn-success" onclick="window.location.replace('{{route('admin.payment.edit', $id)}}')">Editar</button>
<form action="{{ route('admin.payment.destroy', $id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="mb-2 mr-2 btn btn-danger">Eliminar</button>
</form>





