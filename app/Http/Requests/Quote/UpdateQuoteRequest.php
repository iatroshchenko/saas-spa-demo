<?php

namespace App\Http\Requests\Quote;

use App\Models\Quote;
use App\Models\Quote\QuoteShipper;
use App\Models\Quote\QuoteTransport;
use App\Models\Quote\QuoteVehicle;
use App\Models\ZipCode;
use App\Repository\QuoteRepository;
use App\Repository\ShipperRepository;
use App\Models\Shipper;
use Illuminate\Validation\Rule;

class UpdateQuoteRequest extends CreateQuoteRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $quotes = app(QuoteRepository::class);
        $quote = $quotes->findById($this->input('quote_id'));
        return $this->user()->can('edit-quote', $quote);
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
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'email' => ['required', 'email', 'max:255'],
            'type' => [
                'required',
                Rule::in(array_keys(QuoteShipper::TYPES_MAP))
            ],

            // quote shipper
            'company' => ['required', 'string', 'max:255'],
            'address_1' => ['nullable', 'string', 'max:255'],
            'address_2' => ['nullable', 'string', 'max:255'],
            'zip' => ['nullable', 'string', 'min:5', 'max:5'],
            'city' => ['nullable', 'string', 'max:255'],
            'state' => [
                'nullable',
                'string',
                Rule::in(ZipCode::stateAbbrs())
            ],
            'phone_2' => [
                'nullable',
                'string',
                'min:10',
                'max:10'
            ],
            'mobile' => [
                'nullable',
                'string',
                'min:10',
                'max:10'
            ],
            'fax' => [
                'nullable',
                'string',
                'max:20'
            ],
            'notes_from_shipper' => [
                'nullable',
                'string',
                'max:2000'
            ],

            // quote origin
            'quote_origin_zip' => ['required', 'string', 'min:5', 'max:5'],
            'quote_origin_city' => ['required', 'string', 'max:255'],
            'quote_origin_state' => [
                'required',
                'string',
                Rule::in(ZipCode::stateAbbrs())
            ],

            // quote destination
            'quote_destination_zip' => ['required', 'string', 'min:5', 'max:5'],
            'quote_destination_city' => ['required', 'string', 'max:255'],
            'quote_destination_state' => [
                'required',
                'string',
                Rule::in(ZipCode::stateAbbrs())
            ],

            // quote vehicle
            'quote_vehicle_year' => [
                'required',
                'integer',
                'min:1900',
                'max:' . now()->year
            ],
            'quote_vehicle_make' => [
                'required',
                'string',
                'max:255'
            ],
            'quote_vehicle_model' => [
                'required',
                'string',
                'max:255'
            ],
            'quote_vehicle_vin' => [
                'nullable',
                'string',
                'max:40'
            ],
            'quote_vehicle_is_running' => [
                'nullable',
                'boolean'
            ],
            'quote_vehicle_size' => [
                'required',
                Rule::in(array_keys(QuoteVehicle::VEHICLE_SIZE_MAP))
            ],

            // quote transport
            'carrier_type' => [
                'required',
                Rule::in(array_keys(QuoteTransport::CARRIER_TYPES_MAP))
            ],
            'available_date' => [
                'required',
                'date',
                'date_format:Y/m/d'
            ],
            'delivery_date' => [
                'required',
                'date',
                'after_or_equal:available_date',
                'date_format:Y/m/d'
            ],
            'delivery_accuracy' => [
                'required',
                Rule::in(array_keys(QuoteTransport::DELIVERY_ACCURACY_MAP))
            ],
            'distance' => [
                'required',
                'numeric',
                'max:1000000000',
                'min:1'
            ],
            'price' => [
                'required',
                'numeric',
                'max:1000000000',
                'min:1'
            ],
            'deposit' => [
                'nullable',
                'numeric',
                'max:1000000000',
                'min:0'
            ],
            'status' => [
                'required',
                'integer',
                Rule::in(array_keys(Quote::STATUS_MAP))
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

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
