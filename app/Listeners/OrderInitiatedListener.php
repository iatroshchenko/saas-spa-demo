<?php

namespace App\Listeners;

use App\Mail\QuoteDraftEmail;
use Illuminate\Support\Facades\Mail;

class OrderInitiatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $quote = $event->quote;
        Mail::to($quote->quoteShipper->email)->send(new QuoteDraftEmail($quote));
    }
}
