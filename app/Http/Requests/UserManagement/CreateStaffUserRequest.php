<?php

namespace App\Http\Requests\UserManagement;

use App\Concerns\Request\FindsEntitiesByPublicId;
use App\Models\User;
use App\Repository\ShipperRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Shipper;

class CreateStaffUserRequest extends FormRequest
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
        return $shipper && auth()->user()->can('create-users', $shipper);
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
                'required',
                'unique:users,email',
                'string',
                'email',
                'max:255'
            ],
            'role' => [
                'required',
                'integer',
                Rule::in([
                    User::ROLE_ADMIN,
                    User::ROLE_MANAGER,
                    User::ROLE_DRIVER,
                    User::ROLE_DISPATCHER,
                    User::ROLE_CLIENT
                ])
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
