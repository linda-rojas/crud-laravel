@extends('libros/layouts/app')
@section('content')
    <table class="table">
        <h1>Listado de Libros</h1>
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Autor</th>
                <th scope="col">Acciones</th>
                <th>
            </tr>
            <tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
                <tr>
                    <th class="fw-normal">{{ $libro->nombre }}</th>
                    <td>{{ $libro->descripcion }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>
                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST"
                            onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
        </tbody>
        @endforeach
    </table>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@endsection
