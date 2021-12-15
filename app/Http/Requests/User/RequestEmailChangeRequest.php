<?php

namespace App\Http\Requests\User;

use App\Repository\UserRepository;
use Illuminate\Foundation\Http\FormRequest;

class RequestEmailChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $currentUser = $this->user();
        return $currentUser->can('update-users', $currentUser->getShipper());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'max:255', 'email', 'unique:users,email'],
            'old_email' => [
                'required',
                'exists:users,email',
                'email',
                function ($attribute, $value, $fail) {
                    $users = app()->make(UserRepository::class);
                    $user = $users->findByEmail($value);
                    if ($user) {
                        $currentUser = $this->user();
                        $shipper = $currentUser->getShipper();
                        if (!$shipper || !$user->isMemberOf($shipper)) {
                            $fail($attribute . ' is invalid, user not found in your Shipper');
                        }
                    }
                },
            ]
        ];
    }
}
