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
            </tr>
        </thead>
        <tbody>

            @foreach ($libros as $libro)
                <tr>
                    <th class="fw-normal">{{ $libro->nombre }}</th>
                    <td>{{ $libro->descripcion }}</td>
                    <td>{{ $libro->autor }}</td>
                    <td>
                        <button type="button" class="btn btn-info" data-target="#modal{{ $libro->id }}">Editar</button>
                    </td>
                    @include('libros.update');
                </tr>
            @endforeach
        </tbody>
    </table>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
@endsection
