<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Pedido:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $show)
    {
        return Pedido:: where("code_emitter", $show)
                    ->  orwhere("code_receiver", $show)
                    ->  get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Pedido = Pedido:: findorfail($id);

        $Pedido -> update($request -> all());

        return $Pedido;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Pedido = Pedido:: findorfail($id);

        $Pedido -> delete($id);
    }
}
