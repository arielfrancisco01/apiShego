<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliation;

class AvaliationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Avaliation:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $show)
    {
        $avaliation = Avaliation:: where("code_receiver", $show)
                            -> orWhere("code_produto", $show)
                            -> get();

        return $avaliation;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $avaliation = Avaliation:: findorfail($id);

        $avaliation -> update($request -> all());

        return $avaliation;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $avaliation = Avaliation:: findorfail($id);

        $avaliation -> delete($id);
    }
}
