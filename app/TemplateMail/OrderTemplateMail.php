<?php


namespace App\TemplateMail;


use App\Concerns\Mailable\MailableLinksToShipper;
use App\Models\Shipper;
use Spatie\MailTemplates\TemplateMailable;

class OrderTemplateMail extends TemplateMailable implements MailableLinksToShipper
{
    private Shipper $shipper;

    public function __construct(Shipper $shipper)
    {
        $this->shipper = $shipper;
    }

    public function getShipper(): Shipper
    {
        return $this->shipper;
    }
}
