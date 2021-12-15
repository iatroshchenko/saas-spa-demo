<?php

namespace App\Http\Controllers\Api;

use App\Concerns\Controller\SendsEmptyResponse;
use App\Help\CollectionWrapper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Load\CreateLoadRequest;
use App\Http\Requests\Load\DeleteLoadRequest;
use App\Http\Requests\Load\EmailLoadRequest;
use App\Http\Requests\Load\GetLoadRequest;
use App\Http\Requests\Load\UpdateLoadRequest;
use App\Http\Resources\LoadResource;
use App\Models\Load;
use App\Models\Load\LoadTransport;
use App\Repository\LoadRepository;
use App\Service\LoadManagementService;
use Illuminate\Http\JsonResponse;

class LoadController extends Controller
{
    use SendsEmptyResponse;

    private LoadManagementService $loadManagement;
    private LoadRepository $loads;

    public function __construct(
        LoadManagementService $loadManagement,
        LoadRepository $loads
    )
    {
        $this->loadManagement = $loadManagement;
        $this->loads = $loads;
    }

    public function createLoad(CreateLoadRequest $request)
    {
        $load = $this
            ->loadManagement
            ->createLoadFromRequest($request);

        return response()
            ->json([
                'data' => new LoadResource($load)
            ]);
    }

    public function getLoad(GetLoadRequest $request)
    {
        $load = $this
            ->loadManagement
            ->getLoadFromRequest($request);

        if ($load) {
            $load->load([
                'client',
                'driver',
                'loadShipper',
                'loadOrigin',
                'loadDestination',
                'loadTransport',
                'loadVehicles',
                'activities' => function ($query) {
                    $query->orderBy('id', 'desc');
                },
                'activities.causer'
            ]);

            return response()
                ->json([
                    'data' => new LoadResource($load)
                ]);
        }

        return response()
            ->json([
                'data' => null
            ]);
    }

    public function updateLoad(UpdateLoadRequest $request)
    {
        $load = $this
            ->loadManagement
            ->updateLoadFromRequest($request);

        return response()
            ->json([
                'data' => new LoadResource($load)
            ]);
    }

    public function deleteLoad(DeleteLoadRequest $request)
    {
        $this
            ->loadManagement
            ->deleteLoadFromRequest($request);

        return $this
            ->sendDeletedResponse();
    }

    public function emailLoad(EmailLoadRequest $request)
    {
        $load = $this
            ->loads
            ->findById($request->input('load_id'));

        $load->email($request->input('email'));

        return true;
    }

    public function getCarrierPayTermsData(): JsonResponse
    {
        return response()
            ->json([
                'data' => CollectionWrapper::toKeyValueMap(LoadTransport::CARRIER_PAY_TERMS_MAP)
            ]);
    }

    public function getCustomerPayTermsData(): JsonResponse
    {
        return response()
            ->json([
                'data' => CollectionWrapper::toKeyValueMap(LoadTransport::CUSTOMER_PAY_TERMS_MAP)
            ]);
    }

    public function getLoadStatusesData(): JsonResponse
    {
        return response()
            ->json([
               'data' => CollectionWrapper::toKeyValueMap(Load::STATUS_MAP)
            ]);
    }

}
