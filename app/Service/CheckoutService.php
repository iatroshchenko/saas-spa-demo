<?php


namespace App\Service;

use App\Models\Quote;
use App\Models\Quote\QuotePayment;
use App\Models\Shipper;
use App\DTO\Payment\Card;
use App\Http\Requests\Quote\PayQuoteRequest;
use Illuminate\Support\Facades\Log;
use Stripe\StripeClient;

class CheckoutService
{
    const CHARGE_STATUS_SUCCEEDED = "succeeded";

    public function payQuote(PayQuoteRequest $request): ?Quote
    {
        $card = new Card(
            $request->input('card_number'),
            $request->input('card_month'),
            $request->input('card_year'),
            $request->input('card_ccv')
        );

        $shipper = $request->getShipper();
        $quote = $request->getQuote();

        return $this
            ->checkout(
                $card, $quote, $shipper
            );
    }

    public function checkout(
        Card $card, Quote $quote, Shipper $shipper
    )
    {
        $stripeClient = new StripeClient(
            $shipper->getStripeCredentials()->secretKey
        );

        $customerTokens = $stripeClient->tokens->create([
            'card' => [
                'number' => $card->cardNumber,
                'exp_month' => $card->cardMonth,
                'exp_year' => $card->cardYear,
                'cvc' => $card->cardCCV
            ]
        ]);

        $price = (double) $quote->quoteTransport->price * 100;

        $charge = $stripeClient->charges->create([
            'amount' => $price,
            'currency' => 'usd',
            'source' => $customerTokens->id,
            'description' => 'Paid quote #'.  $quote->id,
        ]);

        if ($charge->status === self::CHARGE_STATUS_SUCCEEDED) {

            QuotePayment::create([
                'quote_id' => $quote->id,
                'shipper_id' => $shipper->id,
                'receipt_url' => $charge->receipt_url,
                'status' => $charge->status,
                'customer_id' => $customerTokens->id,
                'payment_method_id' => $charge->payment_method
            ]);

            $quote->update([
                'status' => Quote::STATUS_PAID
            ]);

            return $quote;
        } else {
            Log::info('Payment unsuccessful for quote ' . $quote->id);
            return null;
        }
    }
}
