<?php

namespace App\Repository;

use App\Models\Setting;
use App\Exceptions\Helpers\DatabaseException;
use Illuminate\Support\Collection;

/**
 * Class ShipperSettingRepository
 * @package App\Repository
 */
class SettingRepository
{
    const SETTING_PLAIN_TOKEN_API = 'API';

    public static array $tokenToKeyMap = [
        PersonalAccessTokenRepository::TOKEN_API => self::SETTING_PLAIN_TOKEN_API,
    ];

    /**
     * @return mixed
     * @throws DatabaseException
     */
    public function getAccessKeys()
    {
        $user = auth()->guard()->user();

        $accessKeys = Setting::where([
            'entity_type' => $user->getMorphClass(),
            'entity_id' => $user->id,
            'key' => self::SETTING_PLAIN_TOKEN_API
        ])
            ->get()
            ->keyBy('key')
            ->all();

        if (!array_key_exists(SettingRepository::SETTING_PLAIN_TOKEN_API, $accessKeys)) {
            throw DatabaseException::operationFailed('API key doesn\'t exist');
        }

        return $accessKeys;
    }

    /**
     * @param $entity
     * @param $key
     * @param $value
     * @return mixed
     */
    public function saveSetting($entity, $key, $value)
    {
        return Setting::updateOrCreate([
            'entity_id' => $entity->id,
            'entity_type' => $entity->getMorphClass(),
            'key' => $key,
        ],
        [
            'value' => $value
        ]);
    }

    /**
     * @param $entity
     * @param string|null $settingKey
     * @return Collection|Setting
     */
    public function get($entity, string $settingKey = null)
    {
        $query = Setting::where([
            'entity_id' => $entity->id,
            'entity_type' => $entity->getMorphClass()
        ]);

        if ($settingKey) {
            $query->where('key', $settingKey);
        }

        return $query->get()->{$settingKey ? 'first' : 'all'}();
    }
}
