<?php

namespace App\Help;

/**
 * Class SignatureHelper
 * @package App\Help
 */
class SignatureHelper
{
    private const SALT_ALG = 'sha256';

    /**
     * @param string $privateKey
     * @param string $signature
     * @return bool
     */
    public function validate(string $privateKey, string $signature)
    {
        return $this->createSignature($privateKey) === $signature;
    }

    /**
     * @param string $apiKey
     * @return string
     */
    public function createSignature(string $apiKey)
    {
        return hash_hmac(self::SALT_ALG, $apiKey, config('sanctum.salt'));
    }
}
