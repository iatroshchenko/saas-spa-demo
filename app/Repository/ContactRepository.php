<?php


namespace App\Repository;


use App\Models\Contact;
use App\Models\ContactGroup;

class ContactRepository
{
    public function findById(string $id)
    {
        return Contact::where(Contact::publicKey(), $id)
            ->first();
    }

    public function findGroupById(string $id)
    {
        return ContactGroup::where(ContactGroup::publicKey(), $id)
            ->first();
    }
}
