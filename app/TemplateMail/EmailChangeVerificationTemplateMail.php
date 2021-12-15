<?php


namespace App\TemplateMail;


use App\Concerns\Mailable\MailableLinksToShipper;
use App\Models\Shipper;
use App\Models\User;
use Spatie\MailTemplates\TemplateMailable;

class EmailChangeVerificationTemplateMail extends TemplateMailable implements MailableLinksToShipper
{
    protected static $templateModelClass = Shipper\ShipperMailTemplate::class;

    private Shipper $shipper;
    private User $user;

    public string $email;
    public string $confirmationLink;
    public string $firstName;
    public string $shipperName;
    public string $linkToPlatform;

    public function __construct(
        Shipper $shipper,
        User $user,
        string $email,
        string $confirmationLink
    )
    {
        $this->shipper = $shipper;
        $this->user = $user;
        $this->email = $email;
        $this->confirmationLink = $confirmationLink;
        $this->firstName = $user->first_name;
        $this->shipperName = $shipper->name;
        $this->linkToPlatform = url('/');
    }

    public function getShipper(): Shipper
    {
        return $this->shipper;
    }

    public function getHtmlLayout(): string
    {
        $color = $this->mailTemplate->background_color;

        return view('email_layouts.email_change_verification', compact('color'))
            ->render();
    }
}
