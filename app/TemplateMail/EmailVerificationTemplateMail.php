<?php


namespace App\TemplateMail;


use App\Concerns\Mailable\MailableLinksToShipper;
use App\Models\Shipper;
use App\Models\User;
use Spatie\MailTemplates\TemplateMailable;

class EmailVerificationTemplateMail extends TemplateMailable implements MailableLinksToShipper
{
    protected static $templateModelClass = Shipper\ShipperMailTemplate::class;

    private User $user;

    public string $firstName;
    public string $shipperName;
    public string $verificationUrl;
    public string $linkToPlatform;

    public function __construct(
        User $user
    )
    {
        $this->user = $user;
        $this->firstName = $user->first_name;
        $this->shipperName = $user->getShipper()->name;
        $this->verificationUrl = $user->verificationUrl();
        $this->linkToPlatform = url('/');
    }

    public function getShipper(): Shipper
    {
        return $this->user->getShipper();
    }

    public function getHtmlLayout(): string
    {
        $color = $this->mailTemplate->background_color;

        return view('email_layouts.email_change_verification', compact('color'))
            ->render();
    }
}
