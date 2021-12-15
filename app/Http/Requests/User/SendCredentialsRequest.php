<?php

namespace App\Http\Requests\User;

use App\Models\Shipper;
use App\Models\User;
use App\Repository\ShipperRepository;
use App\Repository\UserRepository;
use App\Http\Requests\FormRequest;

class SendCredentialsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $shippers = app(ShipperRepository::class);
        $shipper = $shippers->findById($this->input('shipper_id'));
        return auth()->user()->can('send-credentials-for-shipper', $shipper);
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
            'email' => [
                'required',
                'email',
                'exists:users,email',
                function ($attribute, $value, $fail) {
                    $users = app()
                        ->make(UserRepository::class);

                    $createdUser = $users->findByEmail($value);
                    $currentUser = auth()->user();

                    if ($createdUser->status !== User::STATUS_INACTIVE) {
                        $fail($attribute.' is invalid.');
                    }

                    $currentShippers = $currentUser->isBusinessOwner() ?
                        $currentUser->controlledShippers :
                        $currentUser->shippers;

                    if ($currentShippers->first()->id !== $createdUser->shippers->first()->id) {
                        $fail($attribute.' is invalid.');
                    }
                }
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:40'
            ]
        ];
    }
}
