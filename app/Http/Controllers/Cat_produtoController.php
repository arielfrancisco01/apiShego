<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cat_produto;

class Cat_produtoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Cat_produto:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_categoria)
    {
        return Cat_produto:: where("code_categoria", $code_categoria)
                                -> get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Cat_produto:: findorfail($id);

        $categoria -> update ($request -> all());

        return $categoria;
    }
}
