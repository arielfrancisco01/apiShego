<?php

namespace App\Http\Controllers;
use App\Models\Residencia;
use App\Models\Municipio;
use App\Models\Provincia;

use Illuminate\Http\Request;

class ResidenciaController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Residencia:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_user)
    {
        $Residencia = Residencia:: where("code_user", $code_user)->firstOrFail();

        $Mun_id = $Residencia -> code_municipio;

        $Municipio =  Municipio:: findorfail($Mun_id);

        $Prov_id = $Municipio -> code_provincia;

        $Provincia = Provincia:: findorfail($Prov_id);

        $response = [
            "residencia" => $Residencia,
            "municipio" => $Municipio,
            "provincia" => $Provincia
        ];

        return $response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Residencia = Residencia:: findorfail($id);

        $Residencia -> update($request -> all());

        return $Residencia;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Residencia = Residencia:: findorfail($id);

        $Residencia -> delete($id);
    }
}
