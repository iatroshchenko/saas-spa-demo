<?php

namespace App\Http\Requests\Google;

use Illuminate\Foundation\Http\FormRequest;

class GetDistanceBetweenRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'origin' => 'required|digits_between:4,6',
            'destination' => 'required|digits_between:4,6'
        ];
    }
}
