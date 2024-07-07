<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Categoria::all();
        
        // return Categoria::inRandomOrder()->get();
        // return Categoria::orderBy('nome_coluna')->get();
        // return Categoria::orderByDesc('nome_coluna')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Categoria::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Categoria::findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findorfail($id);

        $categoria -> update($request -> all());

        return $categoria;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Categoria::destroy($id);
    }
}
