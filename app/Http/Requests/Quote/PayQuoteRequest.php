<?php

namespace App\Http\Requests\Quote;

use App\Concerns\Request\FindsEntitiesByPublicId;
use App\Http\Requests\FormRequest;
use App\Repository\QuoteRepository;
use App\Repository\ShipperRepository;
use App\Models\Shipper;
use Illuminate\Validation\Rule;


class PayQuoteRequest extends FormRequest
{
    use FindsEntitiesByPublicId;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $quotes = app(QuoteRepository::class);
        $quote = $quotes->findById($this->input('quote_id'));
        return $this->user()->can('pay-quote', $quote);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'shipper_id' => [
                'required',
                'exists:shippers,' . Shipper::publicKey(),
                function ($attribute, $value, $fail) {
                    $shippers = app()->make(ShipperRepository::class);
                    $shipper = $shippers->findById($value);

                    if ($shipper) {
                        if (!$this->user()->isMemberOf($shipper)) {
                            $fail($attribute . ' is invalid, ' . ' this user does not belong to this shipper');
                        }
                    }

                    if ($shipper) {
                        if (!$shipper->hasStripeCredentials()) {
                            $fail('This shipper has not set up its payment credentials');
                        }
                    }
                }
            ],
            'quote_id' => [
                'required',
                'exists:quotes,id',
                function ($attribute, $value, $fail) {
                    $shippers = app()->make(ShipperRepository::class);
                    $quotes = app()->make(QuoteRepository::class);

                    $quote = $quotes->findById($value);
                    $shipper = $shippers->findById($this->input('shipper_id'));

                    if ($shipper && $quote) {
                        if ($shipper->id !== $quote->shipper->id) {
                            $fail($attribute . ' is invalid, ' . ' this quote does not belong to this shipper');
                        }
                    }
                },
            ],
            'card_number' => [
                'required',
                'integer'
            ],
            'card_month' => [
                'required',
                Rule::in([
                    '01', 1,
                    '02', 2,
                    '03', 3,
                    '04', 4,
                    '05', 5,
                    '06', 6,
                    '07', 7,
                    '08', 8,
                    '09', 9,
                    10, 11, 12
                ]),
            ],
            'card_year' => [
                'required',
                'integer',
            ],
            'card_ccv' => [
                'required',
                'integer',
            ],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'shipper_id' => $this->route('shipper'),
            'quote_id' => $this->route('quote')
        ]);
    }

}
