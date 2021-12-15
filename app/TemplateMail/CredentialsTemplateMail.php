<?php


namespace App\TemplateMail;

use App\Concerns\Mailable\MailableLinksToShipper;
use App\DTO\Credentials;
use App\Models\Shipper;
use Spatie\MailTemplates\TemplateMailable;


class CredentialsTemplateMail extends TemplateMailable implements MailableLinksToShipper
{
    protected static $templateModelClass = Shipper\ShipperMailTemplate::class;

    protected Shipper $shipper;
    public string $email;
    public ?string $password;
    public string $shipperName;
    public string $platformUrl;

    public function getShipper(): Shipper
    {
        return $this->shipper;
    }

    public function __construct(
        Shipper $shipper,
        Credentials $credentials
    )
    {
        $this->shipper = $shipper;
        $this->email = $credentials->email;
        $this->password = $credentials->password;
        $this->shipperName = $shipper->name;
        $this->platformUrl = url('/');
    }

    public function getHtmlLayout(): string
    {
        $color = $this->mailTemplate->background_color;

        return view('email_layouts.credentials', compact('color'))
            ->render();
    }
}
