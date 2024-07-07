<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($prov)
    {
        return Municipio:: where("code_provincia", $prov)->  get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Municipio:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Municipio:: findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Municipio = Municipio:: findorfail($id);

        $Municipio -> update($request -> all());

        return $Municipio;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Municipio = Municipio:: findorfail($id);

        $Municipio -> delete($id);
    }
}
