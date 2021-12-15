<?php

namespace App\Http\Requests\UserManagement;

use App\Models\User;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Shipper;

class UpdateStaffUserRequest extends FormRequest
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
                Rule::unique('users', 'email')->ignore($this->input('user_id'), User::publicKey()),
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
                    User::ROLE_ADMIN,
                    User::ROLE_MANAGER,
                    User::ROLE_DRIVER,
                    User::ROLE_DISPATCHER
                ])
            ],
            'status' => [
                'required',
                'integer',
                Rule::in([
                    User::STATUS_INACTIVE,
                    User::STATUS_ACTIVE
                ])
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
            'user_id' => $this->route('user')
        ]);
    }
}
