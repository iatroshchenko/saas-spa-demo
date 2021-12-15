<?php

namespace App\Http\Requests\Access;

use App\Models\Shipper;
use Illuminate\Foundation\Http\FormRequest;

class UserCanManageUsersForShipperRequest extends FormRequest
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
            'shipper_id' => [
                'required',
                'string',
                'exists:shippers,' . Shipper::publicKey()
            ]
        ];
    }
}
