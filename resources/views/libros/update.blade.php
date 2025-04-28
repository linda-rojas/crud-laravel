<div class="modal fade" id="modal{{ $libro->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar Libro</h1>
                <form action="{{ route('libros.update', $libro->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <input type="hidden" name="libro_id" value="{{ $libro->id }}">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" value="{{ $libro->nombre }}" name="nombre" required>
                        @error('nombre')
                            <div style="color: red; font-style:oblique">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" value="{{ $libro->descripcion }}" name="descripcion"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="autor" class="form-label">Autor</label>
                        <input type="text" class="form-control" value="{{ $libro->autor }}" name="autor" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@if ($errors->any() && old('libro_id'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modalId = "modal{{ old('libro_id') }}";
            const modalElement = document.getElementById(modalId);
            if (modalElement) {
                const modal = new bootstrap.Modal(modalElement);
                modal.show();
            }
        });
    </script>
@endif
