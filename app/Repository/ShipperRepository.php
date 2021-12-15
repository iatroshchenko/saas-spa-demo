<?php


namespace App\Repository;

use App\Exceptions\Helpers\DatabaseException;
use App\Http\Requests\Register\BusinessRegisterRequest;
use App\Models\Shipper;
use App\Models\Setting;
use App\Models\User;

class ShipperRepository
{
    public function createForUser(User $user, string $name): Shipper
    {
        return Shipper::create([
            'owner_id' => $user->id,
            'name' => $name
        ]);
    }

    public function findById(string $shipperId): ?Shipper
    {
        return Shipper::findByPublicId($shipperId);
    }

    public function createShipperFromBusinessRegisterRequestForUser(
        BusinessRegisterRequest $request,
        User $user
    ): Shipper
    {
        $data = $request->all();
        $data['owner_id'] = $user->id;
        $data['name'] = $request->input('business_name');
        $data['price_per_mile'] = Shipper::DEFAULT_PRICE_PER_MILE;

        $shipper = $this->createFromArray($data);

        if (!$shipper) {
            throw DatabaseException::operationFailed('Shipper creation failed');
        }

        return $shipper;
    }

    public function createFromArray(array $data): Shipper
    {
        $fillable = (new Shipper())->getFillable();
        $data = collect($data)->only($fillable)->all();
        return Shipper::create($data);
    }
}
