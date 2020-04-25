<form action="{{ route('admin.product.delete', $slug) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="mb-2 mr-2 btn btn-danger">Eliminar</button>
</form>

<button class="mb-2 mr-2 btn btn-warning" onclick="window.location.href='{{route('admin.product.edit', $slug)}}'">Editar</button>