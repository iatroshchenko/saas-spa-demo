<?php

namespace App\Http\Requests\Zip;

use Illuminate\Foundation\Http\FormRequest;

class GetPlaceDetailsRequest extends FormRequest
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
            'place_id' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'place_id' => $this->route('place')
        ]);
    }
}
