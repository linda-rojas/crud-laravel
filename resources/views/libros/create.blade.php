@extends('libros.layouts.app')

@section('content')
    <h2 class="text-center">Crear Libro</h2>

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
            @error('nombre')
                <div style="color: red; font-style:oblique">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" name="descripcion" required>
        </div>
        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control" name="autor" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Libro</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@endsection
