<?php

namespace App\Http\Requests\Contact;

use App\Models\Contact;
use App\Models\Customer;
use App\Models\Shipper;
use App\Repository\ContactRepository;
use App\Repository\CustomerRepository;
use App\Repository\ShipperRepository;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends CreateContactRequest
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
            'shipper_id' => [
                'required',
                'string',
                'exists:shippers,' . Shipper::publicKey()
            ],
            'contact_id' => [
                'required',
                'string',
                'exists:contacts,' . Contact::publicKey(),
                function ($attribute, $value, $fail) {
                    $shippers = app(ShipperRepository::class);
                    $shipper = $shippers->findById($this->input('shipper_id'));

                    $contacts = app(ContactRepository::class);
                    $contact = $contacts->findById($value);

                    if ($shipper && $contact) {
                        if ($contact->shipper_id !== $shipper->id) {
                            $fail("This contact does not belong to this shipper");
                        }
                    }
                }
            ],
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
            'contact_id' => $this->route('contact')
        ]);
    }
}
