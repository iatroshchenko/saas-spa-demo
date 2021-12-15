<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteDraftEmail extends Mailable
{
    use Queueable, SerializesModels;

    public Quote $quote;

    /**
     * Create a new message instance.
     *
     * @param Quote $quote
     */
    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $key = $this->quote->shipper->owner->settings()->where('key', 'API')->get()->first();
        return $this->view('emails.quote.draft', ['pub' => $key->value]);
    }
}
