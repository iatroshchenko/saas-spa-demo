<?php

namespace App\Http\Controllers\Api\v1;

use App\Service\ShipperManagementService;
use App\Http\Controllers\Controller;

/**
 * Class BusinessAPIController
 * @package App\Http\Controllers\Api\v1
 *
 * @property ShipperManagementService $businessService
 */
class BusinessAPIController extends Controller
{
    private ShipperManagementService $businessService;

    /**
     * ShipperAPIController constructor.
     * @param ShipperManagementService $businessService
     */
    public function __construct(ShipperManagementService $businessService)
    {
        $this->businessService = $businessService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function getBusinessData()
    {
        $response = $this->businessService->getBusinessData();

        return response()->json($response);
    }
}
