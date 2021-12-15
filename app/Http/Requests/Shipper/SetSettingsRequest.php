<?php

namespace App\Http\Requests\Shipper;

use App\Repository\ShipperRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Shipper;

class SetSettingsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('set-settings');
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
            'price_per_mile' => [
                'required',
                'integer',
                'min:1',
                'max:10000'
            ],
            'public_key' => [
                'nullable',
                'min:1',
                'max:1000'
            ],
            'secret_key' => [
                'nullable',
                'min:1',
                'max:1000'
            ],

            'business_name' => [
                'nullable',
                'string',
                'min:1',
                'max:100'
            ],
            'address' => [
                'nullable',
                'string',
                'min:1',
                'max:100'
            ],
            'email' => [
                'nullable',
                'email',
                'string',
                'max:255'
            ],
            'phone' => ['nullable', 'string', 'max:10', 'min:10'],
            'fax' => ['nullable', 'string', 'max:10', 'min:10'],
            'timezone' => [
                'nullable',
                'string',
                'min:1',
                'max:255'
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
}
