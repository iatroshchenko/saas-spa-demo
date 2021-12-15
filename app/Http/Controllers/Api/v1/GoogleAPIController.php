<?php

namespace App\Http\Controllers\Api\v1;

use App\ApiService\GoogleApiService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Google\GetDistanceBetweenRequest;

/**
 * Class GoogleAPIController
 * @package App\Http\Controllers\Api\v1
 *
 * @property GoogleApiService $googleService
 */
class GoogleAPIController extends Controller
{
    private GoogleApiService $googleService;

    /**
     * GoogleAPIController constructor.
     * @param GoogleApiService $googleService
     */
    public function __construct(GoogleApiService $googleService)
    {
        $this->googleService = $googleService;
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistanceBetween(GetDistanceBetweenRequest $request)
    {
        $origin = $request->get('origin');
        $destination = $request->get('destination');

        $response = $this->googleService->distanceBetweenTwoPoints($origin, $destination);

        return response()->json($response);
    }
}
