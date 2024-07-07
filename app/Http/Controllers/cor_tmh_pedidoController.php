<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cor_tmh_pedido;

class cor_tmh_pedidoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return cor_tmh_pedido:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_pedido)
    {
        return cor_tmh_pedido:: where("code_pedido", $code_pedido) -> get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cor_tmh_pedido = cor_tmh_pedido:: findorfail($id);

        $cor_tmh_pedido -> update($request -> all());

        return $cor_tmh_pedido;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cor_tmh_pedido = cor_tmh_pedido:: findorfail($id);

        $cor_tmh_pedido -> delete($id);
    }
}
