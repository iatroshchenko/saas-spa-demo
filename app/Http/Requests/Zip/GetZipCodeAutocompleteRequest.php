<?php

namespace App\Http\Requests\Zip;

use Illuminate\Foundation\Http\FormRequest;

class GetZipCodeAutocompleteRequest extends FormRequest
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
            'zip' => [
                'required',
                'string',
                'min:3',
                'max:5'
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
            'zip' => $this->route('zip')
        ]);
    }
}
