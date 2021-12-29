<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Response;

class BaseApiController extends Controller
{
    public function respondDeleted(): JsonResponse
    {
        return Response::json([], \Symfony\Component\HttpFoundation\Response::HTTP_NO_CONTENT);
    }

    public function respondError($code, $message = null): JsonResponse
    {
        return Response::json([
            'code' => $code,
            'message' => $message
        ]);
    }

    public function respondResource(JsonResource $resource, $statusCode = 200): JsonResponse
    {
        return $resource->response()->setStatusCode($statusCode);
    }

    public function respondSuccess(array $data = [], $message = '', $statusCode = 200): JsonResponse
    {
        return Response::json([
            'data' => $data,
            'message' => $message,
        ])->setStatusCode($statusCode);
    }
}
