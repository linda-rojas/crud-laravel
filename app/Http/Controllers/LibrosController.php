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
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'autor' => 'required|max:50',
        ]);

        $libro->update($request->all());
        return view('libros/update', compact('libro'));
    }

    public function store(Request $request)
    {
        // (Request datos que enviamos desde el formulario)
        $request->validate([
            'nombre' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'autor' => 'required|max:50',
        ]);

        $libro = new Libros();

        $libro->nombre =  $request->nombre;
        $libro->descripcion = $request->descripcion;
        $libro->autor = $request->autor;
        $libro->save();

        return redirect()->back()->with('success', 'Libro creado exitosamente.');
    }
}
