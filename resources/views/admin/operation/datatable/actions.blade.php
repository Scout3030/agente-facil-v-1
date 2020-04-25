@if($deposit_code_status == App\Operation::DEPOSITINPROCESS)

<form action="{{ route('admin.operation.canceloperation') }}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="id" value="{{$id}}">
    <button type="submit" class="mb-2 mr-2 btn btn-danger">Cancelar</button>
</form>
@endif
@if($deposit_code_status == App\Operation::DEPOSITDONE)
<button class="mb-2 mr-2 btn btn-success" onclick="window.location.replace('{{route('admin.operation.completeoperation', $id)}}')">Completar</button>
@endif