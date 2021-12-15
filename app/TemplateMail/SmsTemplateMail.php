<?php


namespace App\TemplateMail;


use App\Concerns\Mailable\MailableLinksToShipper;
use App\Models\Quote;
use App\Models\Shipper;
use Spatie\MailTemplates\TemplateMailable;

class SmsTemplateMail extends TemplateMailable implements MailableLinksToShipper
{
    protected static $templateModelClass = Shipper\ShipperMailTemplate::class;

    private Quote $quote;

    public string $quoteShipperName;
    public string $quoteOriginAddress;
    public string $quoteDestinationAddress;
    public string $price;
    public string $confirmUrl;
    public string $shipperName;

    public function __construct(Quote $quote)
    {
        $this->quote = $quote;

        $this->quoteShipperName = $quote->shipper->name;
        $this->quoteOriginAddress = $quote->quoteOrigin->address_string;
        $this->quoteDestinationAddress = $quote->quoteDestination->address_string;

        $this->price = $quote->quoteTransport->price;
        $this->confirmUrl = $quote->convertToOrderUrl();
        $this->shipperName = $quote->shipper->name;
    }

    public function getText(): string
    {
        return $this->buildView()['text'];
    }

    public function getShipper(): Shipper
    {
        return $this->quote->shipper;
    }
}
