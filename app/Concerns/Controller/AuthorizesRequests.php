<?php


namespace App\Concerns\Controller;


use Illuminate\Http\JsonResponse;

trait AuthorizesRequests
{
    public function sendAllowedJsonResponse(): JsonResponse
    {
        return response()
            ->json([
                'allowed' => true
            ]);
    }

    public function sendForbiddenJsonResponse(): JsonResponse
    {
        return response()
            ->json([
                'error' => 'unauthorized'
            ], 403);
    }
}
