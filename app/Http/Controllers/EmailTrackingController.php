<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;

class EmailTrackingController extends Controller
{
    public function quoteEmailViewed(Quote $quote)
    {
        if ($quote->status < Quote::STATUS_VIEWED)
        {
            $quote->update([
                'status' => Quote::STATUS_VIEWED
            ]);
        }
    }
}
