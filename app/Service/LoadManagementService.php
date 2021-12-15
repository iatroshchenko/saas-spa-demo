<?php


namespace App\Service;


use App\ApiService\GoogleApiService;
use App\Concerns\Controller\SendsEmptyResponse;
use App\Http\Requests\Load\CreateLoadRequest;
use App\Http\Requests\Load\DeleteLoadRequest;
use App\Http\Requests\Load\GetLoadRequest;
use App\Models\Load;
use App\Repository\LoadRepository;
use Illuminate\Support\Collection;
use App\Models\Shipper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoadManagementService
{
    use SendsEmptyResponse;

    private LoadRepository $loads;
    private ClientManagementService $clientManagement;
    private GoogleApiService $googleApi;

    public function __construct(
        LoadRepository $loads,
        ClientManagementService $clientManagement,
        GoogleApiService $googleApiService
    )
    {
        $this->loads = $loads;
        $this->clientManagement = $clientManagement;
        $this->googleApi = $googleApiService;
    }

    public function getLoadsForShipper(Shipper $shipper): Collection
    {
        $loads = $shipper->loads();

        $currentUser = auth()->user();
        if ($currentUser->isClient()) {
            $loads->where('client_id', $currentUser->id);
        }
        if ($currentUser->isDriver()) {
            $loads->where('driver_id', $currentUser->id);
        }

        $loads->orderByDesc('id');

        return $loads->get();
    }

    public function getLoadFromRequest(GetLoadRequest $request): Load
    {
        return $this
            ->loads
            ->findById($request->input('load_id'));
    }

    public function createLoadFromRequest(CreateLoadRequest $request): Load
    {

        try {
            DB::beginTransaction();

            $clientId = $request->input('client_id');

            if (!$clientId) {
                $client = $this
                    ->clientManagement
                    ->createClientFromLoadRequest($request);

                $request->merge([
                    'client_id' => $client->getPublicKey()
                ]);
            }

            $load = $this
                ->loads
                ->createFromRequest($request);

            if ($request->attachments) {
                foreach ($request->attachments as $key => $attachment)
                {
                    $load
                        ->addMedia($attachment)
                        ->usingFileName(Str::random(11) . '.' . $attachment->getClientOriginalExtension())
                        ->toMediaCollection('attachments');
                }
            }

            $loadShipper = $this
                ->loads
                ->createLoadShipperFromRequest($request, $load);

            $loadOrigin = $this
                ->loads
                ->createLoadOriginFromRequest($request, $load);

            $loadOriginCoordinates = $this
                ->googleApi
                ->getCoordinatesByAddress($loadOrigin->getAddress());

            if ($loadOriginCoordinates) {
                $loadOrigin->update($loadOriginCoordinates);
            }

            $loadDestination = $this
                ->loads
                ->createLoadDestinationFromRequest($request, $load);

            $loadDestinationCoordinates = $this
                ->googleApi
                ->getCoordinatesByAddress($loadDestination->getAddress());

            if ($loadDestinationCoordinates) {
                $loadDestination->update($loadDestinationCoordinates);
            }

            $loadVehicles = $this
                ->loads
                ->createLoadVehiclesFromRequest($request, $load);

            $loadTransport = $this
                ->loads
                ->createLoadTransportFromRequest($request, $load);

            DB::commit();

            return $load;

        } catch (\Throwable $exception) {

            DB::rollBack();
            throw $exception;

        }
    }

    public function updateLoadFromRequest(CreateLoadRequest $request): Load
    {
        try {
            DB::beginTransaction();

            $load = $this
                ->loads
                ->findById($request->input('load_id'));

            if ($request->attachments) {
                // $load->clearMediaCollection('attachments');

                foreach ($request->attachments as $key => $attachment)
                {
                    $load
                        ->addMedia($attachment)
                        ->usingFileName(Str::random(11) . '.' . $attachment->getClientOriginalExtension())
                        ->toMediaCollection('attachments');
                }
            }


            $load->update([
                'status' => $request->input('status'),
                'driver_id' => $request->input('driver_id'),
                'custom_load_number' => $request->input('custom_load_number'),
                'referrer' => $request->input('referrer')
            ]);

            $load->loadShipper()->delete();
            $load->loadOrigin()->delete();
            $load->loadDestination()->delete();
            $load->loadVehicles()->delete();
            $load->loadTransport()->delete();

            $loadShipper = $this
                ->loads
                ->createLoadShipperFromRequest($request, $load);

            $loadOrigin = $this
                ->loads
                ->createLoadOriginFromRequest($request, $load);

            $loadOriginCoordinates = $this
                ->googleApi
                ->getCoordinatesByAddress($loadOrigin->getAddress());

            if ($loadOriginCoordinates) {
                $loadOrigin->update($loadOriginCoordinates);
            }

            $loadDestination = $this
                ->loads
                ->createLoadDestinationFromRequest($request, $load);

            $loadDestinationCoordinates = $this
                ->googleApi
                ->getCoordinatesByAddress($loadDestination->getAddress());

            if ($loadDestinationCoordinates) {
                $loadDestination->update($loadDestinationCoordinates);
            }

            $loadVehicles = $this
                ->loads
                ->createLoadVehiclesFromRequest($request, $load);

            $loadTransport = $this
                ->loads
                ->createLoadTransportFromRequest($request, $load);

            activity()
                ->performedOn($load)
                ->log('edited');

            DB::commit();

            return $load;

        }  catch (\Throwable $exception) {

            DB::rollBack();
            throw $exception;

        }
    }

    public function deleteLoadFromRequest(DeleteLoadRequest $request): ?bool
    {
        return $this
            ->loads
            ->deleteFromRequest($request);
    }

}
