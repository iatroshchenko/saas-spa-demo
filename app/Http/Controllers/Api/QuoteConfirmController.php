<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quote\ClientConvertQuoteToOrderRequest;
use App\Http\Resources\QuoteResource;
use App\Models\Quote;
use App\Repository\QuoteRepository;
use App\Service\QuoteManagementService;
use Illuminate\Http\Request;

class QuoteConfirmController extends Controller
{
    private QuoteManagementService $quoteManagement;
    private QuoteRepository $quotes;

    public function __construct(
        QuoteManagementService $quoteManagement,
        QuoteRepository $quotes
    )
    {
        $this->quoteManagement = $quoteManagement;
        $this->quotes = $quotes;
    }

    /* Signed route to get confirm quote data */
    public function getConfirmQuoteData(Quote $quote)
    {
        $quote->load([
            'client',
            'quoteShipper',
            'quoteOrigin',
            'quoteDestination',
            'quoteTransport',
            'quoteVehicle',
            'activities' => function ($query) {
                $query->orderBy('id', 'desc');
            },
            'activities.causer'
        ]);

        return response()
            ->json([
                'data' => new QuoteResource($quote)
            ]);
    }

    /* Signed route to confirm order */
    public function clientConvertQuoteToOrder(ClientConvertQuoteToOrderRequest $request)
    {
        $quote = $this->quotes->findById($request->route('quote'));

        if ($quote->isOrder()) {
            return redirect(route('start'))
                ->with('quote', 'converted-to-order');
        }

        $quote->update([
            'signature_image' => $request->input('quote_signature')
        ]);

        $this->quoteManagement->convertQuoteToOrder($quote);

        activity()
            ->performedOn($quote)
            ->causedBy($quote->client)
            ->log('converted to order');

        return redirect(route('start'))
            ->with('quote', 'converted-to-order');
    }
}
