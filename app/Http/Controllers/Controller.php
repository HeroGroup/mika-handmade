<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function success($message, $data=null, $status=1)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }

    public function fail($message, $data=null, $status= -1)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }
}
