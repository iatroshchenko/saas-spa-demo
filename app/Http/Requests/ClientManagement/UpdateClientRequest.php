<?php

namespace App\Http\Requests\ClientManagement;

use App\Models\Quote\QuoteShipper;
use App\Models\User;
use App\Models\ZipCode;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use Illuminate\Validation\Rule;
use App\Models\Shipper;

class UpdateClientRequest extends CreateClientRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $shippers = app()->make(ShipperRepository::class);
        $shipper = $shippers->findById($this->route('shipper'));

        $users = app()->make(UserRepository::class);
        $user = $users->findById($this->route('user'));

        if (!$user || !$shipper) return false;

        $currentUser = $this->user();

        if ($user->isSubordinateOf($currentUser)) {
            if ($this->input('email')) {
                return $currentUser->can('update-users', $shipper)
                    && $currentUser->can('directly-update-email');
            }

            return $currentUser->can('update-users', $shipper);
        }

        return false;
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
                'nullable',
                'max:255',
                'email',
                Rule::unique('users', 'email')->ignore($this->input('user_id'), User::publicKey())
            ],
            'shipper_id' => ['required', 'exists:shippers,' . Shipper::publicKey()],
            'user_id' => [
                'required',
                'exists:users,' . User::publicKey(),
                function ($attribute, $value, $fail) {
                    $shippers = app()->make(ShipperRepository::class);
                    $users = app()->make(UserRepository::class);

                    $shipper = $shippers->findById($this->input('shipper_id'));
                    $user = $users->findById($this->input('user_id'));

                    if ($shipper && $user) {
                        if (!$user->isMemberOf($shipper)) {
                            $fail($attribute.' is invalid.');
                        }
                    }
                },
            ],
            'first_name' => ['required', 'string', 'max:60'],
            'last_name' => ['required', 'string', 'max:60'],
            'phone' => ['required', 'string', 'max:10', 'min:10'],
            'role' => [
                'required',
                'integer',
                Rule::in([
                    User::ROLE_CLIENT
                ])
            ],
            'status' => [
                'required',
                'integer',
                Rule::in([
                    User::STATUS_INACTIVE,
                    User::STATUS_ACTIVE
                ])
            ],

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
            'shipper_id' => $this->route('shipper'),
            'user_id' => $this->route('user')
        ]);
    }
}
