<?php

namespace App\Http\Requests\Upload;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadAvatarRequest extends FormRequest
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
            'file' => [
                'required',
                'image',
                Rule::dimensions()
                    ->maxWidth(200)
                    ->maxHeight(200),
                'max:1024'
            ]
        ];
    }

    public function messages()
    {
        return [
            'file.dimensions' => "The maximum avatar size is 200x200"
        ];
    }
}
