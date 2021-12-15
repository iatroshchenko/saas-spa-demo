<?php

namespace App\Http\Controllers\Api;

use App\ApiService\GoogleApiService;
use App\Concerns\Controller\SendsEmptyResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Zip\GetCityAutocompleteRequest;
use App\Http\Requests\Zip\GetPlaceDetailsRequest;
use App\Http\Requests\Zip\GetZipCodeAutocompleteRequest;
use App\Models\ZipCode;
use Illuminate\Http\JsonResponse;

class ZipController extends Controller
{
    use SendsEmptyResponse;

    private GoogleApiService $googleAPI;

    public function __construct(GoogleApiService $googleAPI)
    {
        $this->googleAPI = $googleAPI;
    }

    public function getZipCodePredictions(GetZipCodeAutocompleteRequest $request): JsonResponse
    {
        return response()
            ->json([
                'data' => $this->googleAPI->autocompleteZip(
                    $request->input('zip')
                )
            ]);
    }

    public function getCityPredictions(GetCityAutocompleteRequest $request): JsonResponse
    {
        return response()
            ->json([
                'data' => $this->googleAPI->autocompleteCity(
                    $request->input('city')
                )
            ]);
    }

    public function getPlaceDetails(GetPlaceDetailsRequest $request): JsonResponse
    {
        return response()
            ->json([
                'data' => $this->googleAPI->geocodeByPlaceId(
                    $request->input('place_id')
                )
            ]);
    }

//    public function getZipCodeInfo(GetZipCodeInfoRequest $request)
//    {
//        $zip = $request->input('zip');
//
//        $zipInfo = ZipCode::where('zip', $zip)
//            ->first();
//
//        if (!$zipInfo) {
//            return $this->sendEmptyResponse();
//        }
//
//        return response()
//            ->json([
//                'city' => $zipInfo->primary_city,
//                'state' => $zipInfo->state_name,
//                'state_usps' => $zipInfo->state,
//                'zip' => $zipInfo->zip
//            ]);
//    }

}
