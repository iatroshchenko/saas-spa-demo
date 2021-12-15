<?php

namespace App\Http\Requests\Load;

use App\Concerns\Request\FindsEntitiesByPublicId;
use App\Models\Load\LoadTransport;
use App\Models\Quote;
use App\Models\Quote\QuoteShipper;
use App\Models\Quote\QuoteTransport;
use App\Models\Quote\QuoteVehicle;
use App\Models\User;
use App\Models\ZipCode;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use App\Http\Requests\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Shipper;

class CreateLoadRequest extends FormRequest
{
    use FindsEntitiesByPublicId;

    public static function getLoadDataFromQuote(Quote $quote): array
    {
        $data = [
            'shipper_id' => $quote->shipper->getPublicKey(),
            'client_id' => $quote->client->getPublicKey(),

            'first_name' => $quote->quoteShipper->first_name,
            'last_name' => $quote->quoteShipper->last_name,
            'phone' => $quote->quoteShipper->phone,
            'email' => $quote->quoteShipper->email,
            'type' => $quote->quoteShipper->type,
            'company' => $quote->quoteShipper->company,
            'address_1' => $quote->quoteShipper->address_1,
            'address_2' => $quote->quoteShipper->address_2,
            'zip' => $quote->quoteShipper->zip,
            'city' => $quote->quoteShipper->city,
            'state' => $quote->quoteShipper->state,
            'phone_2' => $quote->quoteShipper->phone_2,
            'mobile' => $quote->quoteShipper->mobile,
            'fax' => $quote->quoteShipper->fax,
            'notes_from_shipper' => $quote->quoteShipper->notes_from_shipper,

            'load_origin_zip' => $quote->quoteOrigin->zip,
            'load_origin_city' => $quote->quoteOrigin->city,
            'load_origin_state' => $quote->quoteOrigin->state,

            'load_destination_zip' => $quote->quoteDestination->zip,
            'load_destination_city' => $quote->quoteDestination->city,
            'load_destination_state' => $quote->quoteDestination->state,

            'carrier_type' => $quote->quoteTransport->carrier_type,
            'available_date' => $quote->quoteTransport->available_date->format('Y/m/d'),
            'delivery_date' => $quote->quoteTransport->delivery_date->format('Y/m/d'),
            'delivery_accuracy' => $quote->quoteTransport->delivery_accuracy,
            'price' => $quote->quoteTransport->price,
            'deposit' => $quote->quoteTransport->deposit,
            'distance' => $quote->quoteTransport->distance,

            'load_vehicles' => []
        ];

        foreach ( $quote->quoteVehicles as $vehicle) {
            $data['load_vehicles'][] = [
                'year' => $vehicle->year,
                'make' => $vehicle->make,
                'model' => $vehicle->model,
                'vin' => $vehicle->vin,
                'is_running' => $vehicle->is_running,
                'size' => $vehicle->size,
                'price' => $vehicle->price
            ];
        }

        return $data;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $shippers = app(ShipperRepository::class);
        $shipper = $shippers->findById($this->input('shipper_id'));
        return $this->user()->can('create-loads-for-shipper', $shipper);
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
                'string',
                'exists:shippers,' . Shipper::publicKey()
            ],
            'client_id' => [
                'nullable',
                'string',
                'exists:users,' . User::publicKey(),
                function ($attribute, $value, $fail) {
                    $users = app(UserRepository::class);
                    $client = $users->findById($value);

                    $shippers = app(ShipperRepository::class);
                    $shipper = $shippers->findById($this->input('shipper_id'));

                    if ($client && $client->isClient() && $shipper) {
                        if (!($client->isMemberOf($shipper))) {
                            $fail('Client id is invalid');
                        }
                    }
                }
            ],
            'driver_id' => [
                'nullable',
                'string',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    $users = app(UserRepository::class);
                    $driver = $users->findById($value);

                    $shippers = app(ShipperRepository::class);
                    $shipper = $shippers->findById($this->input('shipper_id'));

                    if ($driver && $driver->isDriver() && $shipper) {
                        if (!($driver->isMemberOf($shipper))) {
                            $fail('Driver id is invalid');
                        }
                    }
                }
            ],
            'custom_load_number' => [
                'nullable',
                'string',
                'max:40'
            ],
            'referrer' => [
                'nullable',
                'string',
                'max:40'
            ],
            'attachments' => [
                'nullable',
                'array',
            ],
            'attachments.*' => [
                'nullable',
                'file',
                'max:2048',
                'mimetypes:application/pdf,image/jpeg,image/png,application/vnd.ms-excel'
            ],

            // load shipper
            'description' => [
                'nullable',
                'string',
                'max:255'
            ],
            'first_name' => [
                'required',
                'string',
                'max:60'
            ],
            'last_name' => [
                'required',
                'string',
                'max:60'
            ],
            'phone' => [
                'required',
                'string',
                'max:10'
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (!$this->input('client_id')) {
                        $users = app(UserRepository::class);
                        $user = $users->findByEmail($value);
                        if ($user) {
                            $fail('This email has already been taken. Please choose the corresponding client to proceed');
                        }
                    }
                }
            ],
            'type' => [
                'required',
                'integer',
                Rule::in(array_keys(QuoteShipper::TYPES_MAP))
            ],
            'company' => [
                'required',
                'string',
                'max:60'
            ],
            'address_1' => [
                'nullable',
                'string',
                'max:255'
            ],
            'address_2' => [
                'nullable',
                'string',
                'max:255'
            ],
            'zip' => [
                'nullable',
                'string',
                'max:5',
                'min:5'
            ],
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

            // load origin
            'load_origin_name' => [
                'nullable',
                'string',
                'max:255'
            ],
            'load_origin_company'=> [
                'nullable',
                'string',
                'max:255'
            ],
            'load_origin_type' => [
                'nullable',
                'integer',
                Rule::in(array_keys(QuoteShipper::TYPES_MAP))
            ],
            'load_origin_address_1' => [
                'nullable',
                'string',
                'max:255'
            ],
            'load_origin_address_2' => [
                'nullable',
                'string',
                'max:255'
            ],
            'load_origin_city' => ['required', 'string', 'max:255'],
            'load_origin_state' => [
                'required',
                'string',
                Rule::in(ZipCode::stateAbbrs())
            ],
            'load_origin_zip' => ['required', 'string', 'min:5', 'max:5'],
            'load_origin_phone' => [
                'nullable',
                'string',
                'min:10',
                'max:10'
            ],
            'load_origin_phone_2' => [
                'nullable',
                'string',
                'min:10',
                'max:10'
            ],
            'load_origin_mobile' => [
                'nullable',
                'string',
                'min:10',
                'max:10'
            ],
            'load_origin_email' => [
                'nullable',
                'email',
                'max:255'
            ],

            // load destination
            'load_destination_name' => [
                'nullable',
                'string',
                'max:255'
            ],
            'load_destination_company'=> [
                'nullable',
                'string',
                'max:255'
            ],
            'load_destination_type' => [
                'nullable',
                'integer',
                Rule::in(array_keys(QuoteShipper::TYPES_MAP))
            ],
            'load_destination_address_1' => [
                'nullable',
                'string',
                'max:255'
            ],
            'load_destination_address_2' => [
                'nullable',
                'string',
                'max:255'
            ],
            'load_destination_city' => ['required', 'string', 'max:255'],
            'load_destination_state' => [
                'required',
                'string',
                Rule::in(ZipCode::stateAbbrs())
            ],
            'load_destination_zip' => ['required', 'string', 'min:5', 'max:5'],
            'load_destination_phone' => [
                'nullable',
                'string',
                'min:10',
                'max:10'
            ],
            'load_destination_phone_2' => [
                'nullable',
                'string',
                'min:10',
                'max:10'
            ],
            'load_destination_mobile' => [
                'nullable',
                'string',
                'min:10',
                'max:10'
            ],
            'load_destination_email' => [
                'nullable',
                'email',
                'max:255'
            ],

            // load vehicles
            'load_vehicles' => [
                'required',
                'array',
                'min:1'
            ],

            'load_vehicles.*.year' => [
                'required',
                'integer',
                'min:1900',
                'max:' . now()->year
            ],
            'load_vehicles.*.make' => ['required', 'string', 'max:255'],
            'load_vehicles.*.model' => ['required', 'string', 'max:255'],
            'load_vehicles.*.vin' => ['nullable', 'string', 'max:40'],
            'load_vehicles.*.is_running' => [
                'nullable',
                'boolean'
            ],
            'load_vehicles.*.size' => [
                'required',
                Rule::in(array_keys(QuoteVehicle::VEHICLE_SIZE_MAP))
            ],
            'load_vehicles.*.price' => [
                'required',
                'numeric',
                'between:0.01,100000'
            ],
            'load_vehicles.*.state' => [
                'nullable',
                'string',
                'max:40'
            ],
            'load_vehicles.*.color' => [
                'nullable',
                'string',
                'max:30'
            ],
            'load_vehicles.*.plate_number' => [
                'nullable',
                'string',
                'max:30'
            ],
            'load_vehicles.*.lot_number' => [
                'nullable',
                'string',
                'max:30'
            ],
            'load_vehicles.*.p_o_number' => [
                'nullable',
                'string',
                'max:30'
            ],
            'load_vehicles.*.notes' => [
                'nullable',
                'string',
                'max:2000'
            ],

            // load transport
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
            'available_accuracy' => [
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
            'customer_pay_terms' => [
                'nullable',
                'integer',
                Rule::in(array_keys(LoadTransport::CUSTOMER_PAY_TERMS_MAP))
            ],
            'carrier_pay_terms' => [
                'nullable',
                'integer',
                Rule::in(array_keys(LoadTransport::CARRIER_PAY_TERMS_MAP))
            ],
            'carrier_pay' => [
                'nullable',
                'numeric',
                'max:1000000000',
                'min:0'
            ]
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'load_vehicles.*.year.min' => 'Vehicle year must be at least :min',
            'load_vehicles.*.year.max' => 'Vehicle year may not be greater then :max',
            'load_vehicles.*.year.required' => 'Vehicle year is required',
            'load_vehicles.*.make.required' => 'Vehicle make is required',
            'load_vehicles.*.model.required' => 'Vehicle model is required',
            'load_vehicles.*.size.required' => 'Vehicle size is required',
            'load_vehicles.*.vin.required' => 'Vehicle vin is required',
            'load_vehicles.*.vin.max' => 'Vehicle vin may not be greater than :max',
            'load_vehicles.*.vin.in' => 'Vehicle vin is invalid',
            'load_vehicles.*.state.max' => 'Vehicle state may not be greater than :max',
            'load_vehicles.*.price.required' => 'Vehicle price is required',
            'load_vehicles.*.price.between' => 'Vehicle price is not between :min - :max.'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'shipper_id' => $this->route('shipper'),
            'load_vehicles' => json_decode($this->input('load_vehicles'), true)
        ]);
    }
}
