<?php

namespace App\Mail;

use App\DTO\Credentials;
use App\Http\Requests\User\SendCredentialsRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredentialsEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $email;
    public string $password;

    /**
     * Create a new message instance.
     *
     * @param Credentials $credentials
     */
    public function __construct(Credentials $credentials)
    {
        $this->email = $credentials->email;
        $this->password = $credentials->password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS', 'eddy@mydemosaasapp.com'))
            ->view('emails.credentials.send');
    }
}
