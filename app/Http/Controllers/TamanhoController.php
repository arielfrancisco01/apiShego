<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tamanho;

class TamanhoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Tamanho:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_produto)
    {
        return Tamanho:: where("code_produto", $code_produto) -> get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Tamanho = Tamanho:: findorfail($id);

        $Tamanho -> update($request -> all());

        return $Tamanho;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Tamanho = Tamanho:: findorfail($id);

        $Tamanho -> delete($id);
    }
}
