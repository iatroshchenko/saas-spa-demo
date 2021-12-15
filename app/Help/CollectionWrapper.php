<?php


namespace App\Help;


class CollectionWrapper
{
    public static function toKeyValueMap(array $array): array
    {
        $col = collect($array);

        return $col->map(function($item, $key) {
            return [
                'value' => $item,
                'key' => $key
            ];
        })
            ->values()
            ->toArray();
    }
}
