<?php

namespace App\Http\Requests\Contact;

use App\Models\Shipper;
use App\Repository\ShipperRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $shippers = app()->make(ShipperRepository::class);
        $shipper = $shippers->findById($this->input('shipper_id'));
        return $this->user()->can('manage-contacts-for-shipper', $shipper);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'is_primary' => [
                'nullable',
                'boolean'
            ],
            'contact_group_id' => [
                'nullable'
            ],
            'contact_group_name' => [
                'nullable',
                'string',
                'min:1',
                'max:60'
            ],
            'shipper_id' => [
                'required',
                'string',
                'exists:shippers,' . Shipper::publicKey()
            ],
            'first_name' => [
                'required',
                'string',
                'max:255'
            ],
            'last_name' => [
                'required',
                'string',
                'max:255'
            ],
            'phone' => [
                'required',
                'string',
                'min:10',
                'max:10'
            ],
            'email' => [
                'required',
                'string',
                'email',
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
            'shipper_id' => $this->route('shipper'),
            'customer_id' => $this->route('customer')
        ]);
    }
}
