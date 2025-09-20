<?php

namespace App\Traits;

trait ApiResponse
{
    protected function successResponse($data, $message = "Success", $status = 200, $meta = [])
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'errors' => null,
            'meta' => $meta
        ], $status);
    }

    protected function errorResponse($message = "Error", $errors = [], $status = 400)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'data' => null,
            'errors' => $errors
        ], $status);
    }
}