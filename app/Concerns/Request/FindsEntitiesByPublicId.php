<?php


namespace App\Concerns\Request;


use App\Models\Shipper;
use App\Models\User;
use App\Models\Quote;

trait FindsEntitiesByPublicId
{
    public function getShipper(): ?Shipper
    {
        if (!$this->input('shipper_id')) return null;

        return Shipper::findByPublicId($this->input('shipper_id'));
    }

    public function getUser($idInput = null): ?User
    {
        if (!$idInput) {
            $idInput = 'user_id';
        }

        if (!$this->input($idInput)) return null;

        return User::findByPublicId($this->input($idInput));
    }

    public function getQuote(): ?Quote
    {
        if (!$this->input('quote_id')) return null;

        return Quote::find($this->input('quote_id'));
    }
}
