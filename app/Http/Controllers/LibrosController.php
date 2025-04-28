<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    public function create()
    {
        return view('libros.create');
    }

    public function show()
    {
        $libros = new Libros();
        $libros = Libros::all();

        return view('libros.show', compact('libros'));
    }

    public function update(Request $request, Libros $libro)
    {
        $request->validate([
            //asegura que nombre sea unico
            'nombre' => 'required|max:50|unique:libros,nombre,' . $libro->id,
            'descripcion' => 'required|max:255',
            'autor' => 'required|max:50',
        ], [
            'nombre.unique' => 'El nombre del libro ya está registrado',
        ]);

        $libro->update($request->all());
        return redirect()->back()->with('success', 'Libro actualizado exitosamente.');
    }

    public function delete()
    {
        $libros = Libros::all();
        return view('libros.delete', compact('libros'));
    }

    public function destroy(Libros $libro)
    {
        // ya se pasa el id del libro a eliminar en la ruta
        // $libro = Libros::find($libro->id);
        $libro->delete();
        return redirect()->back()->with('success', 'Libro Eliminado exitosamente.');
    }

    public function store(Request $request)
    {
        // (Request datos que enviamos desde el formulario)
        $request->validate([
            'nombre' => 'required|max:50|unique:libros,nombre', //asegura que nombre sea unico
            'descripcion' => 'required|max:255',
            'autor' => 'required|max:50',
        ], [
            'nombre.unique' => 'El nombre del libro ya está registrado, por favor ingrese otro.',
        ]);

        $libro = new Libros();

        $libro->nombre =  $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->autor = $request->autor;
        $libro->save();

        return redirect()->back()->with('success', 'Libro creado exitosamente.');
    }
}
