<?php

namespace App\Http\Requests\Quote;

use App\Repository\QuoteRepository;
use App\Repository\ShipperRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Shipper;

class EmailQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('send-quote-email');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => [
                'required', 'email', 'max:255'
            ],
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
