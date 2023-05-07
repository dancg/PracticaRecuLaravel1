<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::with('category')->orderBy('id','desc')->paginate(8);
        return view('peliculas.inicio', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::select('id','nombre')->orderBy('nombre')->get();
        return view('peliculas.nuevo', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo'=> ['required', 'string', 'min:3', 'unique:peliculas,titulo'],
            'sinopsis'=> ['required', 'string', 'min:10'],
            'doblada'=> ['required', 'in:SI,NO'],
            'duracion'=> ['required', 'integer', 'min:1', 'max:8'],
            'category_id'=> ['required', 'exists:categories,id'],
        ]);
        Pelicula::create($request->all());
        return redirect()->route('peliculas.index')->with('info', 'Película Creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.detalle', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        $categorias = Category::select('id','nombre')->orderBy('nombre')->get();
        return view('peliculas.editar', compact('pelicula','categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'titulo'=> ['required', 'string', 'min:3', 'unique:peliculas,titulo,'.$pelicula->id],
            'sinopsis'=> ['required', 'string', 'min:10'],
            'doblada'=> ['required', 'in:SI,NO'],
            'duracion'=> ['required', 'integer', 'min:1', 'max:8'],
            'category_id'=> ['required', 'exists:categories,id'],
        ]);
        $pelicula->update($request->all());
        return redirect()->route('peliculas.index')->with('info', 'Película Actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect()->route('peliculas.index')->with('info', 'Película Borrada');
    }
}
