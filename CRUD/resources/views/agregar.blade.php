<!-- Modal añadir -->
<div class="modal fade" id="modalAñadir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered animated-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Nueva Persona</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('personas.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="txtnombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="txtnombre" name="txtnombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtapellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="txtapellido" name="txtapellido" required>
                    </div>
                    <div class="mb-3">
                        <label for="txtcorreo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="txtcorreo" name="txtcorreo" required>
                    </div>
                    <div class="mb-3">
                        <label for="txttelefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="txttelefono" name="txttelefono" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
