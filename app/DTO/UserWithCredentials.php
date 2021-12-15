<?php


namespace App\DTO;


use App\Models\User;

class UserWithCredentials
{
    public User $user;
    public Credentials $credentials;

    public function __construct(
        User $user,
        Credentials $credentials
    )
    {
        $this->user = $user;
        $this->credentials = $credentials;
    }
}
