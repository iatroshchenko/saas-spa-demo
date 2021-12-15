<?php


namespace App\Repository;


use App\Http\Requests\Load\CreateLoadRequest;
use App\Http\Requests\Load\DeleteLoadRequest;
use App\Http\Requests\Quote\CreateQuoteRequest;
use App\Http\Requests\Quote\DeleteQuoteRequest;
use App\Models\Load;
use App\Models\Load\LoadShipper;
use App\Models\Load\LoadOrigin;
use App\Models\Load\LoadDestination;
use App\Models\Load\LoadVehicle;
use App\Models\Load\LoadTransport;
use Illuminate\Support\Collection;

class LoadRepository
{
    public function findById(int $id)
    {
        return Load::find($id);
    }

    /* Load itself */
    public function createFromArray(array $data): Load
    {
        return Load::create($data);
    }

    public function createFromRequest(CreateLoadRequest $request): Load
    {
        $fillable = (new Load())
            ->getFillable();

        $data = $request->only($fillable);
        $data['shipper_id'] = $request->getShipper()->id;
        $data['client_id'] = $request->getUser('client_id')->id;

        return $this
            ->createFromArray($data);
    }
    /* Load itself */

    /* Load Shipper */
    public function createLoadShipperFromArray(array $data): LoadShipper
    {
        return LoadShipper::create($data);
    }

    public function createLoadShipperFromRequest(CreateLoadRequest $request, Load $load): LoadShipper
    {
        $fillable = (new LoadShipper())->getFillable();

        $data = $request->only($fillable);
        $data['load_id'] = $load->id;

        return $this->createLoadShipperFromArray($data);
    }
    /* Load Shipper */

    /* Load Origin */
    public function createLoadOriginFromRequest(CreateLoadRequest $request, Load $load): LoadOrigin
    {
        $fillable = (new LoadOrigin())->getFillable();

        $requestKeysToModelKeys = collect($fillable)
            ->mapWithKeys(function ($item) {
                return [
                    'load_origin_' . $item => $item
                ];
            });

        $requestKeysToModelKeysMap = $requestKeysToModelKeys
            ->toArray();

        $data = $request->only($requestKeysToModelKeys->keys()->toArray());

        $fillData = collect($data)
            ->mapWithKeys(function ($item, $key) use ($requestKeysToModelKeysMap) {
                return [
                    $requestKeysToModelKeysMap[$key] => $item
                ];
            })
            ->toArray();

        $fillData['load_id'] = $load->id;

        return $this->createLoadOriginFromArray($fillData);
    }

    public function createLoadOriginFromArray(array $data): LoadOrigin
    {
        return LoadOrigin::create($data);
    }
    /* Load Origin */

    /* Load Destination */
    public function createLoadDestinationFromRequest(CreateLoadRequest $request, Load $load): LoadDestination
    {
        $fillable = (new LoadDestination())->getFillable();

        $requestKeysToModelKeys = collect($fillable)
            ->mapWithKeys(function ($item) {
                return [
                    'load_destination_' . $item => $item
                ];
            });

        $requestKeysToModelKeysMap = $requestKeysToModelKeys
            ->toArray();

        $data = $request->only($requestKeysToModelKeys->keys()->toArray());

        $fillData = collect($data)
            ->mapWithKeys(function ($item, $key) use ($requestKeysToModelKeysMap) {
                return [
                    $requestKeysToModelKeysMap[$key] => $item
                ];
            })
            ->toArray();

        $fillData['load_id'] = $load->id;

        return $this->createLoadDestinationFromArray($fillData);
    }

    public function createLoadDestinationFromArray(array $data): LoadDestination
    {
        return LoadDestination::create($data);
    }
    /* Load Destination */

    /* Load Vehicles */
    public function createLoadVehiclesFromRequest(CreateLoadRequest $request, Load $load): Collection
    {
        $vehicles = $request->input('load_vehicles');

        foreach ($vehicles as $vehicle) {
            $this->createSingleLoadVehicle($vehicle, $load);
        }

        return $load->loadVehicles;
    }

    public function createSingleLoadVehicle(array $vehicle, Load $load): LoadVehicle
    {
        $fillable = (new LoadVehicle())->getFillable();
        $vehicle = collect($vehicle)->only($fillable)->toArray();
        $vehicle['load_id'] = $load->id;
        return $this->createLoadVehicleFromArray($vehicle);
    }

    public function createLoadVehicleFromArray(array $data): LoadVehicle
    {
        return LoadVehicle::create($data);
    }
    /* Load Vehicles */

    /* Load Transport */
    public function createLoadTransportFromRequest(CreateLoadRequest $request, Load $load): LoadTransport
    {
        $fillable = (new LoadTransport())->getFillable();

        $data = $request->only($fillable);
        $data['load_id'] = $load->id;

        return $this->createLoadTransportFromArray($data);
    }

    public function createLoadTransportFromArray(array $data): LoadTransport
    {
        return LoadTransport::create($data);
    }
    /* Load Transport */

    public function deleteFromRequest(DeleteLoadRequest $request): ?bool
    {
        return $this->deleteById($request->input('load_id'));
    }

    public function deleteById(string $id): ?bool
    {
        $load = $this->findById($id);
        if ($load) {
            return $load->delete();
        }
        return false;
    }

}
