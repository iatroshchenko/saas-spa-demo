<?php

namespace App\Http\Requests\Quote;

use App\Http\Requests\FormRequest;
use App\Models\Quote\QuoteVehicle;
use Illuminate\Validation\Rule;

class CreateQuoteDraftRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'email' => ['required', 'email', 'max:255'],

            // quote origin
            'origin' => ['required', 'string', 'min:5', 'max:5'],

//            'quote_origin_city' => ['required', 'string', 'max:255'],
//            'quote_origin_state' => [
//                'required',
//                'string',
//                Rule::in(ZipCode::stateAbbrs())
//            ],

            // quote destination
            'destination' => ['required', 'string', 'min:5', 'max:5'],

//            'quote_destination_city' => ['required', 'string', 'max:255'],
//            'quote_destination_state' => [
//                'required',
//                'string',
//                Rule::in(ZipCode::stateAbbrs())
//            ],

            // quote
            'vehicle_year' => [
                'required',
                'integer',
                'min:1900',
                'max:' . now()->year
            ],

            'vehicle_make' => ['required', 'string', 'max:255'],
            'vehicle_model' => ['required', 'string', 'max:255'],


            'quote_vehicles.*.size' => [
                'required',
                Rule::in(array_keys(QuoteVehicle::VEHICLE_SIZE_MAP))
            ],

            // quote transport

            'pickup_date' => [
                'required',
                'date',
                'after_or_equal:today',
                'date_format:Y-m-d'
            ],

            'total' => [
                'required',
                'numeric',
                'max:1000000000',
                'min:1'
            ],
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
            'quote_vehicles.*.year.required' => 'Vehicle year is required',
            'quote_vehicles.*.make.required' => 'Vehicle make is required',
            'quote_vehicles.*.model.required' => 'Vehicle model is required',
            'quote_vehicles.*.size.required' => 'Vehicle size is required',
            'quote_vehicles.*.vin.required' => 'Vehicle vin is required',
            'quote_vehicles.*.vin.in' => 'Vehicle vin is invalid'
        ];
    }
}
