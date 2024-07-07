<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Frete;

class FreteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Frete::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Frete::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Frete::findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Frete = Frete::findorfail($id);

        $Frete -> update($request -> all());

        return $Frete;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Frete::destroy($id);
    }
}
