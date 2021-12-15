<?php


namespace App\DTO\Payment;


class StripeCredentials
{
    public string $publicKey;
    public string $secretKey;

    public function __construct(
        string $publicKey,
        string $secretKey
    )
    {
        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;
    }
}
