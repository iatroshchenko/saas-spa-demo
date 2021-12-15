<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    /**
     * Validate the class instance.
     *
     * @return void
     */
    public function validateResolved()
    {
        $this->prepareForValidation();

        $instance = $this->getValidatorInstance();

        if ($instance->fails()) {
            $this->failedValidation($instance);
        }

        if (! $this->passesAuthorization()) {
            $this->failedAuthorization();
        }

        $this->passedValidation();
    }
}
