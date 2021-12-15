<?php

namespace App\Http\Requests\Quote;

use App\Repository\QuoteRepository;
use App\Repository\ShipperRepository;
use App\Http\Requests\FormRequest;
use App\Models\Shipper;

class DeleteQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $quotes = app()->make(QuoteRepository::class);
        $quote = $quotes->findById($this->input('quote_id'));
        return $this->user()->can('delete-quote', $quote);
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
            ]
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
