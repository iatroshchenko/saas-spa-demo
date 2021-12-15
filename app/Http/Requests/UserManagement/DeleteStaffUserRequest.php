<?php

namespace App\Http\Requests\UserManagement;

use App\Models\User;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Shipper;

class DeleteStaffUserRequest extends FormRequest
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
        return !!$shipper && $this->user()->can('delete-users', $shipper);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
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
