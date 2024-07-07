<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\CatProduto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produto::all();

        $response = [];

        foreach ($produtos as $produto) {
            $code_produto = $produto->id;

            $categoria = CatProduto::where("code_produto", $code_produto)->firstOrFail();

            $response[] = [
                "produto" => $produto,
                "categoria" => $categoria
            ];
        }

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produto = Produto:: create($request -> all());

        $code_user = $request -> code_user;

        $last = Produto:: where("code_user", $code_user)->latest()->firstOrFail();

        $code_produto = $last -> id;
        $code_categoria = $request -> code_categoria;

        $cat_prod = new CatProduto;

        $cat_prod->code_produto = $code_produto;
        $cat_prod->code_categoria = $code_categoria;

        $cat_prod->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Produto:: findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Produto = Produto:: findorfail($id);

        $Produto -> update($request -> all());

        return $Produto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Produto = Produto:: findorfail($id);

        $Produto -> delete($id);
    }
}
