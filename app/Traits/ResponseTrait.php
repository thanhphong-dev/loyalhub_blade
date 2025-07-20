<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ResponseTrait
{
    /**
     * Generate success response
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $status_code
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(mixed $data = null, string $message = 'success', int $status_code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'status'  => true,
            'message' => $message,
            'data'    => $data,
            'errors'  => null,
        ], $status_code);
    }

    /**
     * Generate success response
     *
     * @param  mixed  $errors
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $status_code
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(mixed $errors = null, mixed $data = null, string $message = 'error', int $status_code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'data'    => $data,
            'errors'  => $errors,
        ], $status_code);
    }
}
