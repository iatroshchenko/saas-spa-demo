<?php

namespace App\Http\Requests\Quote;

use App\Repository\ShipperRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Shipper;

class CalculateQuotePriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('calculate-quote-price');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'origin_zip' => [
                'required',
                'string',
                'min:5',
                'max:5',
            ],
            'destination_zip' => [
                'required',
                'string',
                'min:5',
                'max:5',
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
        ];
    }
}
