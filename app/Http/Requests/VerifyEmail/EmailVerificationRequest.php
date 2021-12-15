<?php

namespace App\Http\Requests\VerifyEmail;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Http\FormRequest;

class EmailVerificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $id = $this->route('id');

        $user = User::find($id);
        if ($user) {
            $this->user = $user;
        } else {
            return false;
        }


        if (! hash_equals((string) $this->route('id'),
            (string) $user->getKey())) {
            return false;
        }

        if (! hash_equals((string) $this->route('hash'),
            sha1($user->getEmailForVerification()))) {
            return false;
        }

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
            //
        ];
    }

    /**
     * Fulfill the email verification request.
     *
     * @return void
     */
    public function fulfill()
    {
        $this->user->markEmailAsVerified();

        event(new Verified($this->user));
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        return $validator;
    }
}
