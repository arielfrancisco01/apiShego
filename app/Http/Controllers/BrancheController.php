<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BrancheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Branch::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Branch::create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_emitter)
    {
        $branch = branch:: where("code_emitter", $code_emitter)-> get();

        return $branch;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $branch = branch:: findorfail($id);

        $branch -> update ($request -> all());

        return $branch;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = branch:: findorfail($id);

        $branch -> delete ($id);
    }
}
