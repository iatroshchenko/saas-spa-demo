<?php


namespace App\DTO;


class Credentials
{
    public string $email;
    public ?string $password;

    public function __construct(
        string $email,
        string $password = null
    )
    {
        $this->email = $email;
        $this->password = $password;
    }
}
