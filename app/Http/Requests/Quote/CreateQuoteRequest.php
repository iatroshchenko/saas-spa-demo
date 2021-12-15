<?php

namespace App\Http\Requests\Quote;

use App\Concerns\Request\FindsEntitiesByPublicId;
use App\Http\Requests\FormRequest;
use App\Models\Quote\QuoteShipper;
use App\Models\Quote\QuoteTransport;
use App\Models\Quote\QuoteVehicle;
use App\Models\User;
use App\Models\ZipCode;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use Illuminate\Validation\Rule;
use App\Models\Shipper;

class CreateQuoteRequest extends FormRequest
{
    use FindsEntitiesByPublicId;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $shippers = app()->make(ShipperRepository::class);
        $shipper = $shippers->findById($this->input('shipper_id'));
        return $shipper && auth()->user()->can('create-quotes-for-shipper', $shipper);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id' => [
                'nullable',
                'exists:users,' . User::publicKey(),
                function ($attribute, $value, $fail) {
                    $users = app()->make(UserRepository::class);
                    $client = $users->findById($value);

                    $shippers = app()->make(ShipperRepository::class);
                    $shipper = $shippers->findById($this->input('shipper_id'));

                    if ($client && $shipper && !$client->isMemberOf($shipper)) {
                        $fail('Client id is invalid');
                    }
                }
            ],
            'shipper_id' => ['required', 'exists:shippers,' . Shipper::publicKey()],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],

            'email' => ['required', 'email', 'max:255', function ($attribute, $value, $fail) {
                if (!$this->input('client_id')) {
                    $users = app()->make(UserRepository::class);
                    $user = $users->findByEmail($value);
                    if ($user) {
                        $fail('This email has already been taken. Please choose the corresponding client to proceed');
                    }
                }
            }],

            // quote shipper
            'type' => [
                'required',
                Rule::in(array_keys(QuoteShipper::TYPES_MAP))
            ],
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
                'after_or_equal:today',
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
                'min:0.01'
            ],
            'price' => [
                'required',
                'numeric',
                'max:1000000000',
                'min:0.01'
            ],
            'deposit' => [
                'nullable',
                'numeric',
                'max:1000000000',
                'min:0'
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
            'shipper_id' => $this->route('shipper')
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
