<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Like::create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_emitter)
    {
        return Like::where("code_emitter", $code_emitter)->get();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $code_emitter, $code_produto)
    {
        $like = Like:: where("code_emitter", $code_emitter);
    }
}
