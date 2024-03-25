<table id="miTabla" class="table table-striped table-bordered table-hover">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Correo</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datos as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->apellido }}</td>
                <td>{{ $item->correo }}</td>
                <td>{{ $item->telefono }}</td>
                <td>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditar{{ $item->id }}"
                        class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('personas.delete', $item->id) }}" onclick="return confirm('¿Estás seguro de eliminar esta persona?')"
                        class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>

            <!-- Modal editar -->
            <div class="modal fade" id="modalEditar{{ $item->id }}" tabindex="-1" aria-labelledby="modalEditarLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditarLabel{{ $item->id }}">Editar Persona</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('personas.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nombre{{ $item->id }}" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre{{ $item->id }}" name="txtnombre" value="{{ $item->nombre }}">
                                </div>
                                <div class="mb-3">
                                    <label for="apellido{{ $item->id }}" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido{{ $item->id }}" name="txtapellido" value="{{ $item->apellido }}">
                                </div>
                                <div class="mb-3">
                                    <label for="correo{{ $item->id }}" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correo{{ $item->id }}" name="txtcorreo" value="{{ $item->correo }}">
                                </div>
                                <div class="mb-3">
                                    <label for="telefono{{ $item->id }}" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono{{ $item->id }}" name="txttelefono" value="{{ $item->telefono }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>
