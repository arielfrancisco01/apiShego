<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;

class CorController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Cor:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_produto)
    {
        $cor = cor::where("code_produto", $code_produto) -> get();

        return $cor;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cor = cor::findorfail($id);

        $cor -> delete($id);
    }
}
