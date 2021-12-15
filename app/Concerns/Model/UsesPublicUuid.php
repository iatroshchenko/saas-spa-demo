<?php


namespace App\Concerns\Model;


trait UsesPublicUuid
{
    protected $publicKeyName = 'uuid';

    public function getPublicKeyName() {
        return $this->publicKeyName;
    }

    /**
     * Get the value of the model's primary key.
     *
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->getAttribute($this->getPublicKeyName());
    }

    public static function findByPublicId($id): ?self
    {
        return self::where(self::publicKey(), $id)
            ->first();
    }

    public static function publicKey()
    {
        return (new self)->getPublicKeyName();
    }
}
