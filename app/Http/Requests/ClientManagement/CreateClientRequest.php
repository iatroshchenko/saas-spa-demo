<?php

namespace App\Http\Requests\ClientManagement;

use App\Concerns\Request\FindsEntitiesByPublicId;
use App\Models\Quote\QuoteShipper;
use App\Models\ZipCode;
use App\Repository\ShipperRepository;
use App\Http\Requests\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Shipper;

class CreateClientRequest extends FormRequest
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
        return $this->user()->can('create-clients-for-shipper', $shipper);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // User
            'email' => [
                'required',
                'unique:users,email',
                'string',
                'email',
                'max:255'
            ],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'shipper_id' => ['required','string','max:255','exists:shippers,' . Shipper::publicKey()],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:30'
            ],
            'ask_password_change_next_login' => [
                'nullable',
                'boolean', // true, false, 1, 0, "1", and "0"
            ],

            // ClientMeta
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
