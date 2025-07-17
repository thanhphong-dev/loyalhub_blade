<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ResponseTrait
{
    public function success(mixed $data = null, string $message = 'success', int $status_code = Response::HTTP_OK)
    {
        return response()->json([
            'status'  => true,
            'message' => $message,
            'data'    => $data,
            'errors'  => null,
        ], $status_code);
    }

    public function error(mixed $errors = null, mixed $data = null, string $message = 'error', int $status_code = Response::HTTP_INTERNAL_SERVER_ERROR)
    {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'data'    => $data,
            'errors'  => $errors,
        ], $status_code);
    }
}
