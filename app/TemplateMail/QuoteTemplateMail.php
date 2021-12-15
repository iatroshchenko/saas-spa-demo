<?php


namespace App\TemplateMail;


use App\Concerns\Mailable\MailableLinksToShipper;
use App\Models\Quote;
use App\Models\Shipper;
use Spatie\MailTemplates\TemplateMailable;

class QuoteTemplateMail extends TemplateMailable implements MailableLinksToShipper
{
    protected static $templateModelClass = Shipper\ShipperMailTemplate::class;

    protected Quote $quote;
    public string $firstName;
    public int $quoteId;
    public string $quoteOriginAddress;
    public string $quoteDestinationAddress;
    public string $firstAvailableDate;
    public string $carrierType;
    public string $price;
    public string $verificationUrl;

    public function getShipper(): Shipper
    {
        return $this->quote->shipper;
    }

    public function __construct(
        Quote $quote
    )
    {
        $this->quote = $quote;
        $this->firstName = $quote->quoteShipper->first_name;
        $this->quoteId = $quote->id;
        $this->quoteOriginAddress = $quote->quoteOrigin->address_string;
        $this->quoteDestinationAddress = $quote->quoteDestination->address_string;
        $this->firstAvailableDate = $quote->quoteTransport->available_date->format('Y/m/d');
        $this->carrierType = $quote->quoteTransport->carrier_type_name;
        $this->price = $quote->quoteTransport->price;
        $this->verificationUrl = $quote->convertToOrderUrl();
    }

    public function getHtmlLayout(): string
    {
        $color = $this->mailTemplate->background_color;
        $quote = $this->quote;

        return view('email_layouts.quote', compact('color', 'quote'))->render();
    }
}
