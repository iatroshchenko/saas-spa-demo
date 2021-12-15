<?php


namespace App\Service;

use App\Repository\PersonalAccessTokenRepository;
use App\Repository\SettingRepository;

/**
 * Class WidgetService
 * @package App\Service
 *
 * @property SettingRepository $shippingSettingRepository
 */
class WidgetService
{
    private SettingRepository $shippingSettingRepository;

    /**
     * WidgetService constructor.
     * @param SettingRepository $shippingSettingRepository
     */
    public function __construct(SettingRepository $shippingSettingRepository)
    {
        $this->shippingSettingRepository = $shippingSettingRepository;
    }

    /**
     * @return mixed
     * @throws \App\Exceptions\Helpers\DatabaseException
     */
    public function getAccessKeys()
    {
        return $this->shippingSettingRepository->getAccessKeys();
    }
}
