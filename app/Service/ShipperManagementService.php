<?php


namespace App\Service;


use App\Exceptions\Helpers\DatabaseException;
use App\Http\Requests\Register\BusinessRegisterRequest;
use App\Http\Resources\ShipperSettingsResource;
use App\Models\Shipper;
use App\Repository\ShipperRepository;
use App\Repository\SettingRepository;
use App\Repository\UserRepository;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\DB;

/**
 * Class BusinessService
 * @package App\Service
 */
class ShipperManagementService
{
    private UserRepository $users;
    private ShipperRepository $shippers;
    private SettingRepository $settings;

    public function __construct(
        UserRepository $users,
        ShipperRepository $shippers,
        SettingRepository $settings
    )
    {
        $this->users = $users;
        $this->shippers = $shippers;
        $this->settings = $settings;
    }

    public function registerNewBusinessFromRequest(BusinessRegisterRequest $request): User
    {
        try {

            DB::beginTransaction();

            $user = $this
                ->users
                ->createBusinessUserFromRequest($request);

            $shipper = $this
                ->shippers
                ->createShipperFromBusinessRegisterRequestForUser($request, $user);

            DB::commit();

            return $user;

        } catch (\Throwable $exception) {

            DB::rollBack();
            throw $exception;

        }
    }

    /**
     * @return array
     * @throws AuthenticationException
     */
    public function getBusinessData()
    {
        $user = auth()->guard()->user();

        if (!$shipper = $user->getShipper()) {
            throw new AuthenticationException();
        }

        return [
            'id' => $shipper->id,
            'owner_id' => $user->id,
            'price_per_mile' => $shipper->price_per_mile,
            'public_key' => $shipper->public_key,
            'secret_key' => $shipper->secret_key,
            'test_mode' => $shipper->test_mode,
        ];
    }

    /**
     * @param string $shipperId
     * @param $key
     * @param $value
     * @return mixed
     * @throws DatabaseException
     */
    public function saveSetting(string $shipperId, $key, $value)
    {
        $shipper = $this->getShipper($shipperId);
        return $this->settings->saveSetting($shipper, $key, $value);
    }

    /**
     * @param string $shipperId
     * @param string $settingKey
     * @return ShipperSettingsResource
     * @throws DatabaseException
     */
    public function getSetting(string $shipperId, string $settingKey)
    {
        $shipper = $this->getShipper($shipperId);
        return ShipperSettingsResource::make($this->settings->get($shipper, $settingKey));
    }

    /**
     * @param string $shipperId
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws DatabaseException
     */
    public function getSettings(string $shipperId)
    {
        $shipper = $this->getShipper($shipperId);

        $settings = $shipper->owner->settings->merge($this->settings->get($shipper));

        return ShipperSettingsResource::collection($settings);
    }

    /**
     * @param string $id
     * @return Shipper
     * @throws DatabaseException
     */
    private function getShipper(string $id)
    {
        $shipper = $this->shippers->findById($id);

        if (!$shipper) {
            throw DatabaseException::notFound($id);
        }

        return $shipper;
    }
}
