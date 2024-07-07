<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detalhe;

class DetalheController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Detalhe:: create ($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_produto)
    {
        $detalhe = Detalhe:: where("code_produto", $code_produto)->get();

        return $detalhe;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $detalhe = Detalhe:: findorfail($id);

        $detalhe -> update($request -> all());

        return $detalhe;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalhe = Detalhe:: findorfail($id);

        $detalhe -> delete($id);
    }
}
