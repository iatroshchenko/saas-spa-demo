<?php


namespace App\Concerns\Mailable;


use App\Models\Shipper;

interface MailableLinksToShipper
{
    public function getShipper() :Shipper;
}
