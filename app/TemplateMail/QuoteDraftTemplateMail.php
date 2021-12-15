<?php


namespace App\TemplateMail;


use App\Concerns\Mailable\MailableLinksToShipper;
use App\Models\Quote;
use App\Models\Shipper;
use Spatie\MailTemplates\TemplateMailable;

class QuoteDraftTemplateMail extends TemplateMailable implements MailableLinksToShipper
{
    protected static $templateModelClass = Shipper\ShipperMailTemplate::class;

    private Quote $quote;

    public string $firstName;
    public int $quoteId;
    public string $quoteOriginAddress;
    public string $quoteDestinationAddress;
    public string $firstAvailableDate;
    public string $carrierType;
    public string $price;
    public string $confirmUrl;

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

        /* Api Key */
        $key = $quote
            ->shipper
            ->owner
            ->settings()
            ->where('key', 'API')
            ->get()
            ->first();

        $pub = $key->value;
        $this->confirmUrl = config('app.url') . '/external/shipper/' . $quote->shipper->id . '/quotes/' . $quote->id .'/accomplish?pub=' . $pub;
    }

    public function getShipper(): Shipper
    {
        return $this->quote->shipper;
    }

    public function getHtmlLayout(): string
    {
        $color = $this->mailTemplate->background_color;

        return view('email_layouts.quote_draft', compact('color'))
            ->render();
    }
}
