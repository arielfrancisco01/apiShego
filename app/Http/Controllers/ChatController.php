<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Chat:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_emitter, $code_receiver)
    {
        $message = chat::where("code_emitter", $code_emitter)
                        -> where("code_receiver", $code_receiver)
                        -> get();

        return $message;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = chat::find($id);

        $message -> update($request -> all());

        return $message;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = chat::find($id);

        $message -> delete();
    }
}
