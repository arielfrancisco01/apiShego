<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Notification:: create($request -> all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $code_receiver)
    {
        return Notification:: where("code_receiver", $code_receiver) -> get();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Notification = Notification:: findorfail($id);

        $Notification -> delete($id);
    }
}
