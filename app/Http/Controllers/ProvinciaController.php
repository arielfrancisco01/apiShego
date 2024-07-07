<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provincia;

class ProvinciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Provincia:: all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Provincia:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Provincia:: findorfail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $provincia = Provincia:: findorfail($id);

        $provincia -> update($request -> all());

        return $provincia;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $provincia = Provincia:: findorfail($id);

        $provincia -> delete($id);
    }
}
