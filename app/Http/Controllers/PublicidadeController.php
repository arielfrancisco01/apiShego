<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicidade;

class PublicidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Publicidade:: all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Publicidade:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $show)
    {
        return Publicidade:: where("id", $show)
                            -> orwhere("code_emitter", $show)
                            -> get();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Publicidade = Publicidade:: findorfail($id);

        $Publicidade -> update($request -> all());

        return $Publicidade;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Publicidade = Publicidade:: findorfail($id);

        $Publicidade -> delete($id);
    }
}
