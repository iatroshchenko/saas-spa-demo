<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Load;

class LoadEmail extends Mailable
{
    use Queueable, SerializesModels;

    public Load $load;

    /**
     * Create a new message instance.
     *
     * @param Load $load
     */
    public function __construct(Load $load)
    {
        $this->load = $load;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.load.send');
    }
}
