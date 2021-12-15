<?php

namespace App\Http\Requests\User;

use App\Repository\UserRepository;
use Illuminate\Foundation\Http\FormRequest;

class ChangeEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    $users = app()->make(UserRepository::class);
                    $user = $users->findByEmail($value);

                    if ($user) {
                        $currentUser = $this->user();
                        $shipper = $currentUser->getShipper();
                        if (!$shipper || !$user->isMemberOf($shipper) || !$user->isSubordinateOf($currentUser)) {
                            $fail($attribute . ' is invalid, user not found in your Shipper');
                        }
                    }
                },
            ],
            'email' => [
                'required',
                'unique:users,email',
                'email'
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
            'user_id' => $this->route('user'),
            'email' => $this->route('email')
        ]);
    }
}
