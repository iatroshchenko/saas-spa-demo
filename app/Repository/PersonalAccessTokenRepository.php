<?php

namespace App\Repository;

/**
 * Class PersonalAccessTokenRepository
 * @package App\Repository
 */
class PersonalAccessTokenRepository
{
    const TOKEN_API = 'API';

    public static array $memberTokens = [
        self::TOKEN_API => ['*'],
    ];
}
