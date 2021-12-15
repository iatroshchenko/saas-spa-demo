<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class EmailChangeVerificationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public string $confirmationLink;
    public User $user;
    public string $email;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param string $email
     * @param string $confirmationLink
     */
    public function __construct(User $user, string $email, string $confirmationLink)
    {
        $this->user = $user;
        $this->email = $email;
        $this->confirmationLink = $confirmationLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS', 'eddy@mydemosaasapp.com'))
            ->view('emails.email_change_verification.send');
    }
}
